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
        dd($request);

        return "ok";
        $entreprises = Entreprise::with('RegimeFiscal')->get();
        //$entreprises->with('RegimeFiscal')->get();
        ($entreprises);
        return view('clients.clientCreate', compact('entreprises'));
    }
}