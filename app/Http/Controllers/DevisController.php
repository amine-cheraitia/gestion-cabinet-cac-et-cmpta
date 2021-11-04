<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;

class DevisController extends Controller
{
    public function create()
    {
        $entreprises = Entreprise::all();
        return view('devis.devisCreate', compact('entreprises'));
    }
}