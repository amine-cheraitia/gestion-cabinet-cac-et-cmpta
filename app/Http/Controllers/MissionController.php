<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function index()
    {
        $missions = Mission::with('entreprise')->get();
        /* dd($missions); */
        return view('missions.missionList', compact('missions'));
    }
}