<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
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
}