<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use App\Models\Entreprise;
use App\Models\Mission;
use App\Models\Prestation;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class MissionController extends Controller
{
    public function index()
    {
        $missions = Mission::with(['entreprise', 'prestation'])->get();

        /* dd($missions); */
        return view('missions.missionList', compact('missions'));
    }

    public function create()
    {
        $entreprises = Entreprise::all();
        $devis = Devis::all(); ///wherenotin
        $prestations = Prestation::all();

        /* dd($missions); */
        return view('missions.missionCreate', compact('entreprises', 'devis', 'prestations'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'start' => 'required',
            'end' => 'required',
            'color' => 'required',
            'textColor' => 'required',
            'prestation_id' => 'required',
            'entreprise_id' => 'required',

        ]);

        $num_missions = IdGenerator::generate(['table' => 'missions', 'field' => 'num_missions', 'length' => 7, 'prefix' => 'M' . date('y') . '-', 'reset_on_prefix_change' => true]);
        $entreprise = Entreprise::whereId($request->entreprise_id)->first();
        $code = Prestation::whereId($request->prestation_id)->first();
        $title = $num_missions . "-" . $entreprise->raison_social . "-" . $code->code_prestation;


        Mission::create(/* request()->all() + */[
            "devis_id" => $request->devis_id,
            "entreprise_id" => $request->entreprise_id,
            "prestation_id" => $request->prestation_id,
            "color" => $request->color,
            "textColor" => $request->textColor,
            "allDay" => 1,
            "status" => 0,
            "start" => $request->start,
            "end" => $request->end,
            "title" => $title,
            'num_missions' => $num_missions,
        ]);


        return redirect()->route('mission.list');
    }
    public function devisContent(Request $request)
    {
    }
}