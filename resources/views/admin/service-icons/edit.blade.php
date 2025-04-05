@extends('admin.layouts.app')

@section('title', 'Edit Service Icon')

@section('content')
    <h1 class="mb-4">Edit Service Icon</h1>
    <div class="card p-4">
        <form action="{{ route('admin.service-icons.update', $serviceIcon) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="IconName" class="form-label">Icon Name</label>
                <input type="text" name="IconName" id="IconName" class="form-control @error('IconName') is-invalid @enderror" value="{{ old('IconName', $serviceIcon->IconName) }}">
                @error('IconName')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-update">Update Service Icon</button>
        </form>
    </div>
@endsection
