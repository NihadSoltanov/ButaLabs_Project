@extends('admin.layouts.app')

@section('title', 'View Portfolio')

@section('content')
    <h1 class="mb-4">Portfolio Details</h1>
    <div class="card p-4">
        <h5 class="card-title">{{ $portfolio->Heading }}</h5>
        <p><strong>Sub Heading:</strong> {{ $portfolio->SubHeading }}</p>
        <p><strong>About:</strong> {{ $portfolio->About }}</p>
        <p><strong>Link:</strong> <a href="{{ $portfolio->Link }}" target="_blank">{{ $portfolio->Link }}</a></p>
        <p><strong>Service:</strong> {{ $portfolio->service->Name ?? 'N/A' }}</p>
        <h6>Project Media:</h6>
        <div class="row">
            @forelse($portfolio->projectMedia as $media)
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
                <p>No project media available.</p>
            @endforelse
        </div>
    </div>
    <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary mt-3">Back to Portfolios</a>
@endsection
