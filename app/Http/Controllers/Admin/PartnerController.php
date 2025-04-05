<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Logo' => 'required|file|mimes:jpg,jpeg,png|max:2048', // Logo, max 2MB
        ]);

        // Logo dosyasını yükle
        $logoPath = $request->file('Logo')->store('partner-logos', 'public');
        $validated['Logo'] = $logoPath;

        Partner::create($validated);

        return redirect()->route('admin.partners.index')->with('success', 'Partner created successfully.');
    }

    public function show(Partner $partner)
    {
        return view('admin.partners.show', compact('partner'));
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Logo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Logo güncelleniyorsa
        if ($request->hasFile('Logo')) {
            // Eski logoyu sil
            Storage::disk('public')->delete($partner->Logo);
            $logoPath = $request->file('Logo')->store('partner-logos', 'public');
            $validated['Logo'] = $logoPath;
        }

        $partner->update($validated);

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner)
    {
        // Logo dosyasını sil
        Storage::disk('public')->delete($partner->Logo);
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted successfully.');
    }
}
