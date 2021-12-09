<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Mission;
use App\Models\Prestation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KpiController extends Controller
{
    public function index()
    {
        $data =  Facture::selectRaw('
        YEAR(date_Facturation) AS y, monthname(date_Facturation) AS m ,month(date_Facturation) AS ma,SUM(montant) montant
    ')
            ->groupBy('y', 'm', "ma")
            ->orderBy('y', 'asc')
            ->get();
        $montants = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0];
        $mois = [];
        foreach ($data as $d) {
            $montants[($d->ma)] = $d->montant;
        }
        $x_max = 0;
        $xdata = [];
        foreach ($montants as $m) {
            if ($x_max < $m) {
                $x_max = $m;
            }
            $xdata[] = $m;
        }
        /*  */
        $missionEncours = Mission::whereStatus(0)->count();
        $missionAchevé = Mission::whereStatus(1)->count();
        $prestationsDevis = DB::select("SELECT p.designation,COUNT(*) AS nbr FROM devis d, prestations p
        WHERE p.id = d.prestation_id GROUP BY p.designation");
        $prestationDemande = [];
        $prestationDemandeeNbr = [];
        foreach ($prestationsDevis as $p) {
            $prestationDemande[] = $p->designation;
            $prestationDemandeeNbr[] = $p->nbr;
        }

        $prestationCA = DB::select("SELECT p.designation,SUM(m.total) AS montant FROM missions m,prestations p
        WHERE p.id = m.prestation_id GROUP BY p.designation");

        $prestationCALabel = [];
        $prestationCaMontant = [];
        $max_montant = 0;
        foreach ($prestationCA as $pCA) {
            if ($max_montant  < $pCA->montant) {
                $max_montant  = $pCA->montant;
            }
            $prestationCALabel[] = $pCA->designation;
            $prestationCaMontant[] = $pCA->montant;
        }

        return view('kpi.kpi', compact('xdata', 'x_max', 'missionEncours', 'missionAchevé', 'prestationDemande', 'prestationDemandeeNbr', "prestationCALabel", "prestationCaMontant", "max_montant"));
    }
}