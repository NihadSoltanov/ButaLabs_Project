@extends('admin.layouts.app')

@section('title', 'Edit Partner')

@section('content')
    <h1 class="mb-4">Edit Partner</h1>
    <div class="card p-4">
        <form action="{{ route('admin.partners.update', $partner) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" name="Name" id="Name" class="form-control @error('Name') is-invalid @enderror" value="{{ old('Name', $partner->Name) }}">
                @error('Name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Logo" class="form-label">Current Logo</label><br>
                <img src="{{ Storage::url($partner->Logo) }}" alt="Logo" style="width: 100px; height: 100px; object-fit: cover; border-radius: 4px;">
            </div>
            <div class="mb-3">
                <label for="Logo" class="form-label">New Logo (Optional)</label>
                <input type="file" name="Logo" id="Logo" class="form-control @error('Logo') is-invalid @enderror" accept="image/jpeg,image/png">
                @error('Logo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-update">Update Partner</button>
        </form>
    </div>
@endsection
