<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Entreprise;
use App\Models\RegimeFiscal;
use App\Models\TypeActivite;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    public function index()
    {
        $entreprises = Entreprise::with('RegimeFiscal')->get();
        //$entreprises->with('RegimeFiscal')->get();
        ($entreprises);
        return view('clients.clientsList', compact('entreprises'));
    }

    public function create()
    {
        $typeActivite = TypeActivite::all();
        $regimeFiscal = RegimeFiscal::all();
        $categorie = Categorie::all();
        //$entreprises->with('RegimeFiscal')->get();

        return view('clients.clientCreate', compact('categorie', 'regimeFiscal', 'typeActivite'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'raison_social' => 'required',
            'num_registre_commerce' => 'required',
            'num_art_imposition' => 'required',
            'num_id_fiscale' => 'required',
            'adresse' => 'required',
            'num_tel' => 'required',
            'email' => 'required|email|',
            'fiscal_id' => 'required',
            'activite_id' => 'required',
            'categorie_id' => 'required',
        ]);
        Entreprise::create(request()->all());
        return redirect()->route('client.index');
        return "ok";
        $entreprises = Entreprise::with('RegimeFiscal')->get();
        //$entreprises->with('RegimeFiscal')->get();
        ($entreprises);
        return view('clients.clientCreate', compact('entreprises'));
    }
}