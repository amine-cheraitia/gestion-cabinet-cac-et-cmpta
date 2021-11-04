<?php

namespace App\Http\Controllers;

use App\Models\Exercice;
use App\Models\Entreprise;
use App\Models\Prestation;
use Illuminate\Http\Request;

class DevisController extends Controller
{
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
        $total = number_format($montant, 2);
        echo $total;
        //echo json_encode(DB::table('sub_categories')->where('category_id', $id)->get());

    }
}