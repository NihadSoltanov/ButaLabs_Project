<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teamMembers = Team::all();
        return view('admin.team.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'FullName' => 'required|string|max:255',
            'Link' => 'nullable|url',
            'Image' => 'required|file|mimes:jpg,jpeg,png|max:2048', // Resim, max 2MB
        ]);

        // Resmi yükle
        $imagePath = $request->file('Image')->store('team-images', 'public');
        $validated['Image'] = $imagePath;

        Team::create($validated);

        return redirect()->route('admin.team.index')->with('success', 'Team member created successfully.');
    }

    public function show(Team $team)
    {
        return view('admin.team.show', compact('team'));
    }

    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'FullName' => 'required|string|max:255',
            'Link' => 'nullable|url',
            'Image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Resim güncelleniyorsa
        if ($request->hasFile('Image')) {
            // Eski resmi sil
            Storage::disk('public')->delete($team->Image);
            $imagePath = $request->file('Image')->store('team-images', 'public');
            $validated['Image'] = $imagePath;
        }

        $team->update($validated);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(Team $team)
    {
        // Resmi sil
        Storage::disk('public')->delete($team->Image);
        $team->delete();
        return redirect()->route('admin.team.index')->with('success', 'Team member deleted successfully.');
    }
}
