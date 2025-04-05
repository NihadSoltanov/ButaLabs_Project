@extends('admin.layouts.app')

@section('title', 'Portfolios')

@section('content')
    <h1 class="mb-4">Portfolios</h1>
    <a href="{{ route('admin.portfolios.create') }}" class="btn btn-create mb-3">Add New Portfolio</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Heading</th>
            <th>Service</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($portfolios as $portfolio)
            <tr>
                <td>{{ $portfolio->id }}</td>
                <td>{{ $portfolio->Heading }}</td>
                <td>{{ $portfolio->service->Name ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('admin.portfolios.show', $portfolio) }}" class="btn btn-view btn-sm">View</a>
                    <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-update btn-sm">Edit</a>
                    <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No portfolios found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
