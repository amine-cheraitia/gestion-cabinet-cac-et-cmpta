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
        $devisUsed = Mission::whereNotNull('devis_id')->get();

        $entreprises = Entreprise::all();
        $devis = Devis::whereNotIn("id", $devisUsed->pluck('devis_id'))->get(); ///wherenotin
        $prestations = Prestation::all();

        /* dd($missions); */
        return view('missions.missionCreate', compact('entreprises', 'devis', 'prestations'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'start' => 'required|date|before:end',
            'end' => 'required|date|after:start',
            'color' => 'required',
            'textColor' => 'required',
            'prestation_id' => 'required',
            'entreprise_id' => 'required',
            "total" => 'required'

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
            "total" => $request->total,
        ]);


        return redirect()->route('mission.list');
    }
    public function devisContent(Request $request)
    {
        $devis_id = $request->get('devis_id');

        $devis = Devis::whereId($devis_id)->first(['id', 'entreprise_id', 'prestation_id', 'total']);

        $total = number_format($devis->total, 2, '.', '');

        return response()->json([
            'total' => $total,
            'entreprise_id' => $devis->entreprise_id,
            'prestation_id' => $devis->prestation_id,
            'devis_id' => $devis->id
        ]);
        //$total = number_format($montant, 2, ',', ' ');
        /* $total = number_format($montant, 2, '.', ''); //12345.67
        echo $total; */
    }
}