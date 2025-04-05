<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $homePages = HomePage::all();
        return view('admin.home-pages.index', compact('homePages'));
    }

    public function create()
    {
        return view('admin.home-pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'MainText' => 'required|string|max:255',
            'SubMainText' => 'nullable|string|max:255',
            'DescriptionTitle' => 'nullable|string|max:255',
            'ShortDescription' => 'nullable|string|max:255',
            'Description' => 'nullable|string',
        ]);

        HomePage::create($request->all());
        return redirect()->route('admin.home-pages.index')->with('success', 'Home Page created successfully.');
    }

    public function show(HomePage $homePage)
    {
        return view('admin.home-pages.show', compact('homePage'));
    }

    public function edit(HomePage $homePage)
    {
        return view('admin.home-pages.edit', compact('homePage'));
    }

    public function update(Request $request, HomePage $homePage)
    {
        $request->validate([
            'MainText' => 'required|string|max:255',
            'SubMainText' => 'nullable|string|max:255',
            'DescriptionTitle' => 'nullable|string|max:255',
            'ShortDescription' => 'nullable|string|max:255',
            'Description' => 'nullable|string',
        ]);

        $homePage->update($request->all());
        return redirect()->route('admin.home-pages.index')->with('success', 'Home Page updated successfully.');
    }

    public function destroy(HomePage $homePage)
    {
        $homePage->delete();
        return redirect()->route('admin.home-pages.index')->with('success', 'Home Page deleted successfully.');
    }
}
