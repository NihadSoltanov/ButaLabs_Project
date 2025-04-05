@extends('admin.layouts.app')

@section('title', 'Home Pages')

@section('content')
    <h1 class="mb-4">Home Pages</h1>
    <a href="{{ route('admin.home-pages.create') }}" class="btn btn-create mb-3">Add New Home Page</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Main Text</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($homePages as $homePage)
            <tr>
                <td>{{ $homePage->id }}</td>
                <td>{{ $homePage->MainText }}</td>
                <td>
                    <a href="{{ route('admin.home-pages.show', $homePage) }}" class="btn btn-view btn-sm">View</a>
                    <a href="{{ route('admin.home-pages.edit', $homePage) }}" class="btn btn-update btn-sm">Edit</a>
                    <form action="{{ route('admin.home-pages.destroy', $homePage) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">No home pages found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
