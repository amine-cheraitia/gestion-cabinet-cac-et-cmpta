<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function index()
    {
        $taches = Tache::with(['mission', 'user'])->get();

        return view('taches.tachesList', compact('taches'));
    }

    public function show($id)
    {
        $taches = Tache::all();

        return view('taches.tachesList', compact('taches'));
    }

    public function create()
    {
        $taches = Tache::all();

        return view('taches.tachesList', compact('taches'));
    }

    public function store()
    {
        $taches = Tache::all();

        return view('taches.tachesList', compact('taches'));
    }

    public function edit($id)
    {
        $taches = Tache::all();

        return view('taches.tachesList', compact('taches'));
    }

    public function update($id)
    {
        $taches = Tache::all();

        return view('taches.tachesList', compact('taches'));
    }

    public function destroy()
    {
        $taches = Tache::all();

        return view('taches.tachesList', compact('taches'));
    }
}