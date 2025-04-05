@extends('admin.layouts.app')

@section('title', 'View Partner')

@section('content')
    <h1 class="mb-4">Partner Details</h1>
    <div class="card p-4">
        <h5 class="card-title">{{ $partner->Name }}</h5>
        <p><strong>Logo:</strong></p>
        <img src="{{ Storage::url($partner->Logo) }}" alt="Logo" class="img-fluid" style="max-width: 200px;">
    </div>
    <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary mt-3">Back to Partners</a>
@endsection
