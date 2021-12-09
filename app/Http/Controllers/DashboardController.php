<?php

namespace App\Http\Controllers;

use App\Models\Facture;
/* use Illuminate\Http\Request; */
use App\Http\Requests\StoreFactureRequest;
use App\Http\Requests\UpdateFactureRequest;
use App\Models\Mission;
use GuzzleHttp\Psr7\Request;
/* use Psy\Util\Json; */

class DashboardController extends Controller
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


        return view('dashboards.mainDashboard', compact('xdata', 'x_max', 'missionEncours', 'missionAchevé'));
    }

    /*     public function fetchCA(Request $request)
    {
        $data = ($fact = Facture::selectRaw('
        YEAR(date_Facturation) AS y, monthname(date_Facturation) AS m ,month(date_Facturation) AS ma,SUM(montant) montant
    ')
            ->groupBy('y', 'm', "ma")
            ->orderBy('y', 'asc')
            ->get());
        $montants = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0];
        $mois = [];
        foreach ($data as $d) {
            $montants[($d->ma)] = $d->montant;
        }

        $xdata = [];
        $x_max = 0;
        foreach ($montants as $m) {
            if ($x_max < $m) {
                $x_max = $m;
            }
            $xdata[] = $m;
        }
        return response()->json(
            [
                'xdata' => $xdata,
                'x_max' => $x_max
            ]
        );
    } */
}