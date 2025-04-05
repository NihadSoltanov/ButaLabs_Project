@extends('admin.layouts.app')

@section('title', 'Create Service Icon')

@section('content')
    <h1 class="mb-4">Create Service Icon</h1>
    <div class="card p-4">
        <form action="{{ route('admin.service-icons.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="IconName" class="form-label">Icon Name</label>
                <input type="text" name="IconName" id="IconName" class="form-control @error('IconName') is-invalid @enderror" value="{{ old('IconName') }}">
                @error('IconName')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-create">Add Service Icon</button>
        </form>
    </div>
@endsection
