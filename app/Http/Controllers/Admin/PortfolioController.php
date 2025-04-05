<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('service')->get();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        $services = Service::all();
        return view('admin.portfolios.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Heading' => 'required|string|max:255',
            'SubHeading' => 'nullable|string|max:255',
            'About' => 'nullable|string',
            'Link' => 'nullable|url',
            'ServiceID' => 'required|exists:services,id',
        ]);

        Portfolio::create($request->all());
        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio created successfully.');
    }

    public function show(Portfolio $portfolio)
    {
        $portfolio->load('service', 'projectMedia');
        return view('admin.portfolios.show', compact('portfolio'));
    }

    public function edit(Portfolio $portfolio)
    {
        $services = Service::all();
        return view('admin.portfolios.edit', compact('portfolio', 'services'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'Heading' => 'required|string|max:255',
            'SubHeading' => 'nullable|string|max:255',
            'About' => 'nullable|string',
            'Link' => 'nullable|url',
            'ServiceID' => 'required|exists:services,id',
        ]);

        $portfolio->update($request->all());
        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio deleted successfully.');
    }
}
