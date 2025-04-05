@extends('admin.layouts.app')

@section('title', 'About List')

@section('content')
    <div class="container">
        <h1>About List</h1>

        <!-- Create Button -->
        <div class="mb-3">
            <a href="{{ route('admin.about.create') }}" class="btn btn-create">Create New About</a>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- About Table -->
        @if ($abouts->isEmpty())
            <p>No About entries found.</p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>SubTitle</th>
                        <th>Text</th>
                        <th>Media</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($abouts as $about)
                        <tr>
                            <td>{{ $about->id }}</td>
                            <td>{{ $about->Title }}</td>
                            <td>{{ $about->SubTitle }}</td>
                            <td>{{ Str::limit($about->Text, 50) }}</td>
                            <td>
                                @if ($about->aboutImages->isNotEmpty())
                                    @foreach ($about->aboutImages as $media)
                                        @if ($media->media_type == 'image')
                                            <img src="{{ asset('storage/' . $media->media_path) }}" alt="Media" width="50" class="me-2">
                                        @elseif ($media->media_type == 'video')
                                            <video width="50" controls class="me-2">
                                                <source src="{{ asset('storage/' . $media->media_path) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @endif
                                    @endforeach
                                @else
                                    No media
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.about.show', $about) }}" class="btn btn-view btn-sm">View</a>
                                <a href="{{ route('admin.about.edit', $about) }}" class="btn btn-update btn-sm">Edit</a>
                                <form action="{{ route('admin.about.destroy', $about) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure you want to delete this About?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
