@extends('admin.layouts.app')

@section('title', 'View Project Media')

@section('content')
    <h1 class="mb-4">Project Media Details</h1>
    <div class="card p-4">
        <p><strong>Media URL:</strong> <img src="{{ $projectMedium->MediaURL }}" alt="Media" style="max-width: 200px;"></p>
        <p><strong>Portfolio:</strong> {{ $projectMedium->portfolio->Heading ?? 'N/A' }}</p>
    </div>
    <a href="{{ route('admin.project-media.index') }}" class="btn btn-secondary mt-3">Back to Project Media</a>
@endsection
