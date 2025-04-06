<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $teamMembers = Team::all();
        return view('frontend.team', compact('teamMembers'));
    }
}
