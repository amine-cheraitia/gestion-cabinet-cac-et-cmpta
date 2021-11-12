<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Tache;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use RealRashid\SweetAlert\Facades\Alert;

class TacheController extends Controller
{
    public function index()
    {
        $taches = Tache::with(['mission', 'user'])->get();

        return view('taches.tachesList', compact('taches'));
    }

    public function show($id)
    {
        $tache = Tache::findOrFail($id)->with(['user', 'mission']);

        return view('taches.tacheShow', compact('tache'));
    }

    public function create()
    {
        $users = User::all();
        $missions = Mission::all();


        return view('taches.tacheCreate', compact('users', 'missions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required',
            'start' => 'required|date|before:end',
            'end' => 'required|date|after:start',
            'color' => 'required',
            'textColor' => 'required',
            'mission_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $num_tache = IdGenerator::generate(['table' => 'taches', 'field' => 'num_tache', 'length' => 7, 'prefix' => 'T' . date('y') . '-', 'reset_on_prefix_change' => true]);
        $user = User::whereId($request->user_id)->first();
        $titleMission = Mission::whereId($request->mission_id)->with('entreprise', 'prestation')->first();
        $title = $num_tache . "-" . $user->name . "-" . $titleMission->entreprise->raison_social . "-" . $titleMission->prestation->code_prestation;

        Tache::create([
            'designation' => $request->designation,
            'title' => $title,
            'start' => $request->start,
            'end' => $request->end,
            'allDay' => 0,
            'color' => $request->color,
            'textColor' => $request->textColor,
            'status' => 0,
            'mission_id' => $request->mission_id,
            'user_id' => $request->user_id,
            'num_tache' => $num_tache,
        ]);

        alert()->success('Tâche', 'Tâche ajouté avec succée');
        return redirect()->route('tache.list');
    }

    public function edit($id)
    {
        $users = User::all();
        $missions = Mission::all();
        $tache = Tache::whereId($id)->first();

        return view('taches.tacheEdit', compact('tache', 'missions', 'users'));
    }

    public function update($id)
    {
        /* dd(request()->start . " + " . Carbon::parse(request()->start)->format('Y-m-d H:i:s')); */
        $data = request()->validate([
            'designation' => 'required',
            'start' => 'required|before:end',
            'end' => 'required|after:start',
            'color' => 'required',
            'textColor' => 'required',
            'mission_id' => 'required|integer',
            'user_id' => 'required|integer',
            'status' => 'required|integer'
        ]);
        //title
        $num_tache = Tache::whereId($id)->first('num_tache');
        $user = User::whereId(request()->user_id)->first();
        $titleMission = Mission::whereId(request()->mission_id)->with('entreprise', 'prestation')->first();
        $title = $num_tache . "-" . $user->name . "-" . $titleMission->entreprise->raison_social . "-" . $titleMission->prestation->code_prestation;

        $start = Carbon::parse(request()->start)->format('Y-m-d H:i:s');
        $end = Carbon::parse(request()->end)->format('Y-m-d H:i:s');


        Tache::whereId($id)->update([
            "title" => $title,
            'designation' => request()->designation,

            'start' => $start,
            'end' => $end,
            'allDay' => 0,
            'color' => request()->color,
            'textColor' => request()->textColor,
            'status' => request()->status,
            'mission_id' => request()->mission_id,
            'user_id' => request()->user_id,

        ]);

        alert()->success('Tâche', 'Tâche a bien été mise à jour');
        return redirect()->route('tache.list');
    }

    public function destroy()
    {
        $taches = Tache::all();

        return view('taches.tachesList', compact('taches'));
    }
}