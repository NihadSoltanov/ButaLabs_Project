@extends('admin.layouts.app')

@section('title', 'View Team Member')

@section('content')
    <h1 class="mb-4">Team Member Details</h1>
    <div class="card p-4">
        <h5 class="card-title">{{ $team->FullName }}</h5>
        <p><strong>LinkedIn Link:</strong> <a href="{{ $team->Link }}" target="_blank">{{ $team->Link ?? 'N/A' }}</a></p>
        <p><strong>Image:</strong></p>
        <img src="{{ Storage::url($team->Image) }}" alt="Image" class="img-fluid" style="max-width: 200px;">
    </div>
    <a href="{{ route('admin.team.index') }}" class="btn btn-secondary mt-3">Back to Team</a>
@endsection
