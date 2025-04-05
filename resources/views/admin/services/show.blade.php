@extends('admin.layouts.app')

@section('title', 'View Service')

@section('content')
    <h1 class="mb-4">Service Details</h1>
    <div class="card p-4">
        <h5 class="card-title">{{ $service->Name }}</h5>
        <p><strong>Short Description:</strong> {{ $service->shortDesc }}</p>
        <p><strong>About Title:</strong> {{ $service->AboutTitle }}</p>
        <p><strong>About Text:</strong> {{ $service->AboutText }}</p>
        <p><strong>Icon:</strong> {{ $service->serviceIcon->IconName ?? 'N/A' }}</p>
        <h6>Portfolios:</h6>
        <ul>
            @forelse($service->portfolios as $portfolio)
                <li>{{ $portfolio->Heading }}</li>
            @empty
                <li>No portfolios found.</li>
            @endforelse
        </ul>
    </div>
    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary mt-3">Back to Services</a>
@endsection
