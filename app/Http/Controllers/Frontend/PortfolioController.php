<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('projectMedia')->get();
        return view('frontend.portfolio.index', compact('portfolios'));
    }

    public function show(Portfolio $portfolio)
    {
        $portfolio->load('projectMedia');
        return view('frontend.portfolio.show', compact('portfolio'));
    }
}
