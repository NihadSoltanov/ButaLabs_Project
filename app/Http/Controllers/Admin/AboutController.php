<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::with('aboutImages')->get();
        return view('admin.about.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Title' => 'required|string|max:255',
            'SubTitle' => 'required|string|max:255',
            'Text' => 'required|string',
            'media.*' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:10240', // Resim veya video, max 10MB
        ]);

        // About oluştur
        $about = About::create($validated);

        // Medya dosyalarını yükle
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                if ($file) {
                    $mediaType = $file->getClientOriginalExtension() == 'mp4' ? 'video' : 'image';
                    $mediaPath = $file->store('about-media', 'public');

                    AboutImage::create([
                        'about_id' => $about->id,
                        'media_path' => $mediaPath,
                        'media_type' => $mediaType,
                    ]);
                }
            }
        }

        return redirect()->route('admin.about.index')->with('success', 'About created successfully.');
    }

    public function show(About $about)
    {
        $about->load('aboutImages');
        return view('admin.about.show', compact('about'));
    }

    public function edit(About $about)
    {
        $about->load('aboutImages');
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $validated = $request->validate([
            'Title' => 'required|string|max:255',
            'SubTitle' => 'required|string|max:255',
            'Text' => 'required|string',
            'media.*' => 'nullable|file|mimes:jpg,jpeg,png,mp4|max:10240',
        ]);

        // About güncelle
        $about->update($validated);

        // Yeni medya dosyalarını yükle (mevcut medyalar korunacak)
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                if ($file) {
                    $mediaType = $file->getClientOriginalExtension() == 'mp4' ? 'video' : 'image';
                    $mediaPath = $file->store('about-media', 'public');

                    AboutImage::create([
                        'about_id' => $about->id,
                        'media_path' => $mediaPath,
                        'media_type' => $mediaType,
                    ]);
                }
            }
        }

        return redirect()->route('admin.about.index')->with('success', 'About updated successfully.');
    }

    public function destroy(About $about)
    {
        // Medya dosyalarını sil
        foreach ($about->aboutImages as $media) {
            Storage::disk('public')->delete($media->media_path);
            $media->delete();
        }

        $about->delete();
        return redirect()->route('admin.about.index')->with('success', 'About deleted successfully.');
    }
}
