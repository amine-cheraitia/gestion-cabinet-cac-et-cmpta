<?php

namespace App\Http\Controllers;

use App\Models\Tache;
/* use Illuminate\Http\Request; */
use App\Models\Facture;
use App\Models\Mission;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFactureRequest;
use App\Http\Requests\UpdateFactureRequest;
/* use Psy\Util\Json; */

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {


        /*         dd(Auth::user()->isSecretaire() ? "yes" : "no");
        dd(Auth::user()->hasAnyRole(['Comptable', 'Auditeur']) ? "yes" : "no");  legall.charlotte@example.net cmp@cabinetmeddahi.com
        dd(Auth::user()->isSecretaire() ? "yes":"no");                          nassima@meddahi.com
        dd(Auth::user()->isAdmin() ? "yes" : "no");                             amine-cheraitia@hotmail.com
*/
        if (Auth::user()->isAdmin()) {
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
            $factAnnulé = Facture::whereNotNull('fact_avoir_id')->get('fact_avoir_id');

            $chiffreDaffaire = Facture::whereTypeFactureId(1)->whereNotIn('id', $factAnnulé)->sum('montant');


            return view('dashboards.mainDashboard', compact('xdata', 'x_max', 'missionEncours', 'missionAchevé', 'chiffreDaffaire'));
        } elseif (Auth::user()->isSecretaire()) {
            # code...
        } elseif (Auth::user()->hasAnyRole(['Comptable', 'Auditeur'])) {
            $tachesEncours = Tache::whereUserId(Auth::user()->id)->whereStatus(0)->count();
            $tachesAchevé = Tache::whereUserId(Auth::user()->id)->whereStatus(1)->count();
            return view('dashboards.Auditeur&ComptableDashboard', compact('tachesEncours', 'tachesAchevé'));
        } else {
        }
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