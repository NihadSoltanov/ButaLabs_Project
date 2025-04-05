<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceIcon;
use Illuminate\Http\Request;

class ServiceIconController extends Controller
{
    public function index()
    {
        $serviceIcons = ServiceIcon::all();
        return view('admin.service-icons.index', compact('serviceIcons'));
    }

    public function create()
    {
        return view('admin.service-icons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'IconName' => 'required|string|max:255',
        ]);

        ServiceIcon::create($request->all());
        return redirect()->route('admin.service-icons.index')->with('success', 'Service Icon created successfully.');
    }

    public function show(ServiceIcon $serviceIcon)
    {
        $serviceIcon->load('services');
        return view('admin.service-icons.show', compact('serviceIcon'));
    }

    public function edit(ServiceIcon $serviceIcon)
    {
        return view('admin.service-icons.edit', compact('serviceIcon'));
    }

    public function update(Request $request, ServiceIcon $serviceIcon)
    {
        $request->validate([
            'IconName' => 'required|string|max:255',
        ]);

        $serviceIcon->update($request->all());
        return redirect()->route('admin.service-icons.index')->with('success', 'Service Icon updated successfully.');
    }

    public function destroy(ServiceIcon $serviceIcon)
    {
        $serviceIcon->delete();
        return redirect()->route('admin.service-icons.index')->with('success', 'Service Icon deleted successfully.');
    }
}
