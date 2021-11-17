<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Paiement;
use App\Models\TypePaiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function index()
    {
        $paiements = Paiement::all();
        return view('paiements.paiementsList', compact('paiements'));
    }

    public function create()
    {
        $typePaiements = TypePaiement::all();
        $factures = Facture::whereTypeFactureId(1)->get();

        return view('paiements.paiementCreate', compact('typePaiements', 'factures'));
    }
    public function fetch(Request $request)
    {
        $montant = Facture::whereId($request->facture_id)->first()->montant;

        return response()->json($montant);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "montant" => "required",
            "num_piece_c" => "required|min:1",
            "date_paiement" => "required|date",
            "type_paiement_id" => "required",
            "facture_id" => "required",
        ]);

        Paiement::create($data);
        alert()->success('Paiement', "Paiement a bien été enregistrer");
        return redirect()->route('paiement.list')->with('message', "Paiement a bien été enregistrer");
    }

    public function edit($id)
    {
        $typePaiements = TypePaiement::all();
        $factures = Facture::whereTypeFactureId(1)->get();
        $paiement = Paiement::whereId($id)->first();

        return view('paiements.paiementEdit', compact('paiement', 'typePaiements', 'factures'));
    }

    public function update($id)
    {
        $data = request()->validate([
            "montant" => "required",
            "num_piece_c" => "required|min:1",
            "date_paiement" => "required|date",
            "type_paiement_id" => "required",
            "facture_id" => "required",
        ]);

        Paiement::whereId($id)->update($data);
        alert()->success('Paiement', 'Paiement a bien été mise à jour');
        return redirect()->route('paiement.list');
    }
    public function destroy()
    {
    }
}