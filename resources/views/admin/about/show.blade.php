@extends('admin.layouts.app')

@section('title', 'View About')

@section('content')
    <h1 class="mb-4">About Details</h1>
    <div class="card p-4">
        <h5 class="card-title">{{ $about->Title }}</h5>
        <p><strong>SubTitle:</strong> {{ $about->SubTitle }}</p>
        <p><strong>Text:</strong> {{ $about->Text }}</p>
        <h6>About Media:</h6>
        <div class="row">
            @forelse($about->aboutImages as $media)
                <div class="col-md-3 mb-3">
                    @if($media->media_type == 'image')
                        <img src="{{ Storage::url($media->media_path) }}" alt="Media" class="img-fluid">
                    @else
                        <video controls class="img-fluid">
                            <source src="{{ Storage::url($media->media_path) }}" type="video/mp4">
                        </video>
                    @endif
                </div>
            @empty
                <p>No media available.</p>
            @endforelse
        </div>
    </div>
    <a href="{{ route('admin.about.index') }}" class="btn btn-secondary mt-3">Back to About</a>
@endsection
