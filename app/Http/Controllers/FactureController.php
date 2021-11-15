<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Mission;
use App\Models\Exercice;
use App\Models\TypeFacture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;



class FactureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $factures = Facture::with('mission')->get();

        return view("factures.facturesList", compact("factures"));
    }

    public function create()
    {
        $missions = Mission::all();
        $exercices = Exercice::all();
        /*         $typefactures = TypeFacture::all();
        $facturesavoir = Facture::all(); */

        return view("factures.factureCreate", compact("missions", "exercices"/* , "typefactures", "facturesavoir" */));
    }

    public function store(Request $request)
    {


        $request->validate([
            'mission_id' => 'required',
            'date_facturation' => 'required',
            'exercice_id' => 'required',
            'montant' => 'required',
        ]);
        $num_fact = IdGenerator::generate(['table' => 'factures', 'field' => 'num_fact', 'length' => 8, 'prefix' => 'FF' . date('y') . '-', 'reset_on_prefix_change' => true]);
        $montant = number_format($request->montant, 2, '.', '');

        Facture::create(/* request()->all() + */[
            'num_fact' => $num_fact,
            "date_facturation" => $request->date_facturation,
            "montant" => $montant,
            "mission_id" => $request->mission_id,
            "exercice_id" => $request->exercice_id,
            'type_facture_id' => 1
        ]);
        alert()->success('Facture', 'Facture crée avec succée');
        return redirect()->route('facture.list');
    }

    public function edit($id)
    {

        /* dd(Facture::groupBy("mission_id")->selectRaw('mission_id,count(*) as totalfact')->get()); */
        /* $factureFinal = Facture::whereNotIn("mission_id", $devisUsed->pluck('devis_id'))->get(); */
        /*
        $missionfull = DB::table('factures')->select(['mission_id', DB::raw('count(*)')])
            ->groupBy('mission_id')
            ->having(DB::raw('count(*)'), '=', 3)->pluck('mission_id');

        $missionban =   $missionfull->push(Facture::whereId($id)->first(['mission_id'])->mission_id);
        dd($missionban);
        $missions = Mission::whereNotIn('id', $missionban)->get();*/
        $missions = Mission::all();
        /* dd(Facture::groupBy("mission_id")->selectRaw('mission_id,count(*) as totalfact')->having(DB::raw('count(mission_id)'), '<', 2)->get()); */
        $exercices = Exercice::all();
        $facture = Facture::whereId($id)->first();

        return view("factures.factureEdit", compact("facture", "missions", "exercices"));
    }

    public function update(Request $request)
    {


        $data = request()->validate([
            'date_facturation' => 'required|date',
            'exercice_id' => 'required',
            'mission_id' => 'required',
            'montant' => 'required',
        ]);
        Facture::whereId(request()->id)->update($data);
        alert()->success('Facture', 'Facture a bien été mise à jour');
        return redirect()->route('facture.list');
    }

    public function destroy(Request $request)
    {
        $factures = Facture::with('mission');

        return view("factures.facturesList", compact("factures"));
    }

    public function calculPrix(Request $request)
    {
        $mission_id = $request->get('mission_id');
        $mission = Mission::whereId($mission_id)->first();
        $designation = $mission->prestation->designation;

        if ($request->edit) {
            $totalFacture = Facture::whereMissionId($mission_id)->whereTypeFactureId(1)->count() - 1;
        } else {
            $totalFacture = Facture::whereMissionId($mission_id)->whereTypeFactureId(1)->count();
        }

        /*         if (($totalFacture == 0) or ($totalFacture == 1) or ($totalFacture == -1)) {
            $tranche = $mission->total * 0.3;
        } elseif (($totalFacture > 1)) {
            $tranche = $mission->total * 0.4;
        } else {
            alert()->error('erreur', 'erreur');
        } */
        if ($totalFacture == 2) {
            $tranche = null;
            return response()->json([
                "total" => null,
                "designation" => null,
                "totalFacture" => null
            ]);
        } elseif ($totalFacture == 1) {
            $tranche = $mission->total * 0.4;
        } else {
            $tranche = $mission->total * 0.3;
        }
        $total = number_format($tranche, 2, '.', '');

        /*         $reponse = $designation;
        $reponse = $total; */

        return response()->json([
            "total" => $total,
            "designation" => $designation,
            "totalFacture" => $totalFacture
        ]);
    }
}