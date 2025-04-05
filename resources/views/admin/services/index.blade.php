@extends('admin.layouts.app')

@section('title', 'Services')

@section('content')
    <h1 class="mb-4">Services</h1>
    <a href="{{ route('admin.services.create') }}" class="btn btn-create mb-3">Add New Service</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Icon</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->Name }}</td>
                <td>{{ $service->serviceIcon->IconName ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('admin.services.show', $service) }}" class="btn btn-view btn-sm">View</a>
                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-update btn-sm">Edit</a>
                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No services found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
