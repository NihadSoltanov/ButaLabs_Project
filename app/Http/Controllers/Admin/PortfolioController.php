<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\ProjectMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('service', 'projectMedia')->get();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        $services = Service::all();
        return view('admin.portfolios.create', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Heading' => 'required|string|max:255',
            'SubHeading' => 'nullable|string|max:255',
            'About' => 'nullable|string',
            'Link' => 'nullable|url',
            'ServiceID' => 'required|exists:services,id',
            'media.*' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:10240', // Resim veya video, max 10MB
        ]);

        // Portfolio oluştur
        $portfolio = Portfolio::create($validated);

        // Medya dosyalarını yükle
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                if ($file) { // Dosya null değilse
                    $mediaType = $file->getClientOriginalExtension() == 'mp4' ? 'video' : 'image';
                    $mediaPath = $file->store('project-media', 'public'); // storage/app/public/project-media klasörüne kaydet

                    ProjectMedia::create([
                        'portfolio_id' => $portfolio->id,
                        'media_path' => $mediaPath,
                        'media_type' => $mediaType,
                    ]);
                }
            }
        }

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
        $portfolio->load('projectMedia');
        return view('admin.portfolios.edit', compact('portfolio', 'services'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'Heading' => 'required|string|max:255',
            'SubHeading' => 'nullable|string|max:255',
            'About' => 'nullable|string',
            'Link' => 'nullable|url',
            'ServiceID' => 'required|exists:services,id',
            'media.*' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:10240', // Resim veya video, max 10MB
        ]);

        // Portfolio güncelle
        $portfolio->update($validated);

        // Yeni medya dosyalarını yükle (mevcut medyalar korunacak)
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                if ($file) { // Dosya null değilse
                    $mediaType = $file->getClientOriginalExtension() == 'mp4' ? 'video' : 'image';
                    $mediaPath = $file->store('project-media', 'public');

                    ProjectMedia::create([
                        'portfolio_id' => $portfolio->id,
                        'media_path' => $mediaPath,
                        'media_type' => $mediaType,
                    ]);
                }
            }
        }

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        // Medya dosyalarını sil
        foreach ($portfolio->projectMedia as $media) {
            Storage::disk('public')->delete($media->media_path);
            $media->delete();
        }

        $portfolio->delete();
        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio deleted successfully.');
    }
}
