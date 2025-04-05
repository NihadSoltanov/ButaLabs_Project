@extends('admin.layouts.app')

@section('title', 'Edit Team Member')

@section('content')
    <h1 class="mb-4">Edit Team Member</h1>
    <div class="card p-4">
        <form action="{{ route('admin.team.update', $team) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="FullName" class="form-label">Full Name</label>
                <input type="text" name="FullName" id="FullName" class="form-control @error('FullName') is-invalid @enderror" value="{{ old('FullName', $team->FullName) }}">
                @error('FullName')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Link" class="form-label">LinkedIn Link (Optional)</label>
                <input type="url" name="Link" id="Link" class="form-control @error('Link') is-invalid @enderror" value="{{ old('Link', $team->Link) }}">
                @error('Link')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Image" class="form-label">Current Image</label><br>
                <img src="{{ Storage::url($team->Image) }}" alt="Image" style="width: 100px; height: 100px; object-fit: cover; border-radius: 4px;">
            </div>
            <div class="mb-3">
                <label for="Image" class="form-label">New Image (Optional)</label>
                <input type="file" name="Image" id="Image" class="form-control @error('Image') is-invalid @enderror" accept="image/jpeg,image/png">
                @error('Image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-update">Update Team Member</button>
        </form>
    </div>
@endsection
