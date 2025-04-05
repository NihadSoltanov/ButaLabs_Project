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
            <th>Media</th>
            <th>Media Count</th>
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
                    @if($portfolio->projectMedia->isNotEmpty())
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($portfolio->projectMedia->take(3) as $media)
                                @if($media->media_type == 'image')
                                    <img src="{{ Storage::url($media->media_path) }}" alt="Media" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                @else
                                    <video style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;" controls>
                                        <source src="{{ Storage::url($media->media_path) }}" type="video/mp4">
                                    </video>
                                @endif
                            @endforeach
                            @if($portfolio->projectMedia->count() > 3)
                                <span class="badge bg-secondary">+{{ $portfolio->projectMedia->count() - 3 }} more</span>
                            @endif
                        </div>
                    @else
                        <span>No media available</span>
                    @endif
                </td>
                <td>{{ $portfolio->projectMedia->count() }}</td>
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
                <td colspan="6" class="text-center">No portfolios found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
