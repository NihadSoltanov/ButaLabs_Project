@extends('admin.layouts.app')

@section('title', 'Team')

@section('content')
    <h1 class="mb-4">Team</h1>
    <a href="{{ route('admin.team.create') }}" class="btn btn-create mb-3">Add New Team Member</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($teamMembers as $team)
            <tr>
                <td>{{ $team->id }}</td>
                <td>{{ $team->FullName }}</td>
                <td>
                    <img src="{{ Storage::url($team->Image) }}" alt="Image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                </td>
                <td>
                    <a href="{{ route('admin.team.show', $team) }}" class="btn btn-view btn-sm">View</a>
                    <a href="{{ route('admin.team.edit', $team) }}" class="btn btn-update btn-sm">Edit</a>
                    <form action="{{ route('admin.team.destroy', $team) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No team members found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
