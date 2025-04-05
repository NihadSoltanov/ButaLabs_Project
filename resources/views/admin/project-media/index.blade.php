@extends('admin.layouts.app')

@section('title', 'Project Media')

@section('content')
    <h1 class="mb-4">Project Media</h1>
    <a href="{{ route('admin.project-media.create') }}" class="btn btn-create mb-3">Add New Project Media</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Media URL</th>
            <th>Portfolio</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($projectMedia as $media)
            <tr>
                <td>{{ $media->id }}</td>
                <td><img src="{{ $media->MediaURL }}" alt="Media" style="max-width: 100px;"></td>
                <td>{{ $media->portfolio->Heading ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('admin.project-media.show', $media) }}" class="btn btn-view btn-sm">View</a>
                    <a href="{{ route('admin.project-media.edit', $media) }}" class="btn btn-update btn-sm">Edit</a>
                    <form action="{{ route('admin.project-media.destroy', $media) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No project media found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
