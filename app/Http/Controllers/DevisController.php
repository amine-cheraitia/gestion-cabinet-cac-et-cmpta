<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use App\Models\Exercice;
use App\Models\Entreprise;
use App\Models\Prestation;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DevisController extends Controller
{
    public function index()
    {
        $devis = Devis::with('entreprise')->get();
        return view('devis.devisList', compact('devis'));
    }

    public function create()
    {
        $entreprises = Entreprise::all();
        $exercices = Exercice::all();
        $prestations = Prestation::all();
        //teste

        //fin du teste
        return view('devis.devisCreate', compact('entreprises', 'exercices', "prestations"));
    }

    public function calculPrix(Request $request)
    {
        $entreprise_id = $request->get('entreprise_id');
        $prestation_id = $request->get('prestation_id');
        $tarifInitial = Prestation::whereId($prestation_id)->first();
        $indiceFiscal = Entreprise::whereId($entreprise_id)->with('RegimeFiscal')->first()->RegimeFiscal->indice_tarif;
        $indiceCategorie = Entreprise::whereId($entreprise_id)->with('categorie')->first()->categorie->indice_tarif;
        $montant = $indiceFiscal * $indiceCategorie * $tarifInitial->tarif_initial;
        //$total = number_format($montant, 2, ',', ' ');
        $total = number_format($montant, 2, '.', ''); //12345.67
        echo $total;
        //echo json_encode(DB::table('sub_categories')->where('category_id', $id)->get());

    }

    public function store(Request $request)
    {

        $request->validate([
            'date_devis' => 'required',
            'exercice_id' => 'required',
            'entreprise_id' => 'required',
            'prestation_id' => 'required',
            'total' => 'required',
        ]);
        $num_devis = IdGenerator::generate(['table' => 'devis', 'field' => 'num_devis', 'length' => 8, 'prefix' => 'DV' . date('y') . '-', 'reset_on_prefix_change' => true]);
        $total = number_format($request->total, 2, '.', '');

        Devis::create(/* request()->all() + */[
            "exercice_id" => $request->exercice_id,
            "entreprise_id" => $request->entreprise_id,
            "prestation_id" => $request->prestation_id,
            "total" => $total,
            "date_devis" => $request->date_devis,
            'num_devis' => $num_devis,
        ]);
        return redirect()->route('devis.list');
    }

    public function edit($id)
    {

        $devis = Devis::whereId($id)->first();
        $entreprises = Entreprise::all();
        $exercices = Exercice::all();
        $prestations = Prestation::all();

        return view('devis.devisEdit', compact('entreprises', 'devis', 'exercices', 'prestations'));
    }

    public function update($id)
    {

        $data = request()->validate([
            'date_devis' => 'required',
            'exercice_id' => 'required',
            'entreprise_id' => 'required',
            'prestation_id' => 'required',
            'total' => 'required',
        ]);
        Devis::whereId($id)->update($data);
        return redirect()->route('devis.list');
    }

    public function destroy($id)
    {

        Devis::whereId($id)->delete();
        return redirect()->route('devis.list');
    }
}