<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Partner;
use App\Models\Team;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::with('serviceIcon')->get();
        $portfolios = Portfolio::take(3)->get();
        $partners = Partner::all();
        $teamMembers = Team::all();
        return view('frontend.home', compact('services', 'portfolios', 'partners', 'teamMembers'));
    }
}
