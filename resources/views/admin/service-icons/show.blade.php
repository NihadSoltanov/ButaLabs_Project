@extends('admin.layouts.app')

@section('title', 'View Service Icon')

@section('content')
    <h1 class="mb-4">Service Icon Details</h1>
    <div class="card p-4">
        <h5 class="card-title">{{ $serviceIcon->IconName }}</h5>
        <h6>Services:</h6>
        <ul>
            @forelse($serviceIcon->services as $service)
                <li>{{ $service->Name }}</li>
            @empty
                <li>No services found.</li>
            @endforelse
        </ul>
    </div>
    <a href="{{ route('admin.service-icons.index') }}" class="btn btn-secondary mt-3">Back to Service Icons</a>
@endsection
