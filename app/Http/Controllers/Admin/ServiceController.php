<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceIcon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('serviceIcon')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $serviceIcons = ServiceIcon::all();
        return view('admin.services.create', compact('serviceIcons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'shortDesc' => 'nullable|string|max:255',
            'AboutTitle' => 'nullable|string|max:255',
            'AboutText' => 'nullable|string',
            'ServiceIconId' => 'required|exists:service_icons,id',
        ]);

        Service::create($request->all());
        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function show(Service $service)
    {
        $service->load('serviceIcon', 'portfolios');
        return view('admin.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        $serviceIcons = ServiceIcon::all();
        return view('admin.services.edit', compact('service', 'serviceIcons'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'shortDesc' => 'nullable|string|max:255',
            'AboutTitle' => 'nullable|string|max:255',
            'AboutText' => 'nullable|string',
            'ServiceIconId' => 'required|exists:service_icons,id',
        ]);

        $service->update($request->all());
        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
