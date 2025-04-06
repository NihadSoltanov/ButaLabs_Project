<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $teamMembers = Team::all();
        return view('frontend.team.index', compact('teamMembers'));
    }

    public function show(Team $team)
    {
        return view('frontend.team.show', compact('team'));
    }
}
