@extends('admin.layouts.app')

@section('title', 'Service Icons')

@section('content')
    <h1 class="mb-4">Service Icons</h1>
    <a href="{{ route('admin.service-icons.create') }}" class="btn btn-create mb-3">Add New Service Icon</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Icon Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($serviceIcons as $icon)
            <tr>
                <td>{{ $icon->id }}</td>
                <td>{{ $icon->IconName }}</td>
                <td>
                    <a href="{{ route('admin.service-icons.show', $icon) }}" class="btn btn-view btn-sm">View</a>
                    <a href="{{ route('admin.service-icons.edit', $icon) }}" class="btn btn-update btn-sm">Edit</a>
                    <form action="{{ route('admin.service-icons.destroy', $icon) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">No service icons found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
