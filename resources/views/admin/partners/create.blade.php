@extends('admin.layouts.app')

@section('title', 'Create Partner')

@section('content')
    <h1 class="mb-4">Create Partner</h1>
    <div class="card p-4">
        <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" name="Name" id="Name" class="form-control @error('Name') is-invalid @enderror" value="{{ old('Name') }}">
                @error('Name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Logo" class="form-label">Logo</label>
                <input type="file" name="Logo" id="Logo" class="form-control @error('Logo') is-invalid @enderror" accept="image/jpeg,image/png">
                @error('Logo')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-create">Add Partner</button>
        </form>
    </div>
@endsection
