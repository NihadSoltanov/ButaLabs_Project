@extends('admin.layouts.app')

@section('title', 'Partners')

@section('content')
    <h1 class="mb-4">Partners</h1>
    <a href="{{ route('admin.partners.create') }}" class="btn btn-create mb-3">Add New Partner</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Logo</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($partners as $partner)
            <tr>
                <td>{{ $partner->id }}</td>
                <td>{{ $partner->Name }}</td>
                <td>
                    <img src="{{ Storage::url($partner->Logo) }}" alt="Logo" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                </td>
                <td>
                    <a href="{{ route('admin.partners.show', $partner) }}" class="btn btn-view btn-sm">View</a>
                    <a href="{{ route('admin.partners.edit', $partner) }}" class="btn btn-update btn-sm">Edit</a>
                    <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No partners found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
