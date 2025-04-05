<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectMedia;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class ProjectMediaController extends Controller
{
    public function index()
    {
        $projectMedia = ProjectMedia::with('portfolio')->get();
        return view('admin.project-media.index', compact('projectMedia'));
    }

    public function create()
    {
        $portfolios = Portfolio::all();
        return view('admin.project-media.create', compact('portfolios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'MediaURL' => 'required|url',
            'ProjectId' => 'required|exists:portfolios,id',
        ]);

        ProjectMedia::create($request->all());
        return redirect()->route('admin.project-media.index')->with('success', 'Project Media created successfully.');
    }

    public function show(ProjectMedia $projectMedium)
    {
        $projectMedium->load('portfolio');
        return view('admin.project-media.show', compact('projectMedium'));
    }

    public function edit(ProjectMedia $projectMedium)
    {
        $portfolios = Portfolio::all();
        return view('admin.project-media.edit', compact('projectMedium', 'portfolios'));
    }

    public function update(Request $request, ProjectMedia $projectMedium)
    {
        $request->validate([
            'MediaURL' => 'required|url',
            'ProjectId' => 'required|exists:portfolios,id',
        ]);

        $projectMedium->update($request->all());
        return redirect()->route('admin.project-media.index')->with('success', 'Project Media updated successfully.');
    }

    public function destroy(ProjectMedia $projectMedium)
    {
        $projectMedium->delete();
        return redirect()->route('admin.project-media.index')->with('success', 'Project Media deleted successfully.');
    }
}
