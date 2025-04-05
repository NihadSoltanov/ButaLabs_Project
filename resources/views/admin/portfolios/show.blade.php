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
        @forelse($portfolio->projectMedia as $media)
            <p><img src="{{ $media->MediaURL }}" alt="Media" style="max-width: 200px;"></p>
        @empty
            <p>No project media available.</p>
        @endforelse
    </div>
    <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary mt-3">Back to Portfolios</a>
@endsection
