@extends('admin.layouts.app')

@section('title', 'Create Service')

@section('content')
    <h1 class="mb-4">Create Service</h1>
    <div class="card p-4">
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" name="Name" id="Name" class="form-control @error('Name') is-invalid @enderror" value="{{ old('Name') }}">
                @error('Name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="shortDesc" class="form-label">Short Description</label>
                <input type="text" name="shortDesc" id="shortDesc" class="form-control" value="{{ old('shortDesc') }}">
            </div>
            <div class="mb-3">
                <label for="AboutTitle" class="form-label">About Title</label>
                <input type="text" name="AboutTitle" id="AboutTitle" class="form-control" value="{{ old('AboutTitle') }}">
            </div>
            <div class="mb-3">
                <label for="AboutText" class="form-label">About Text</label>
                <textarea name="AboutText" id="AboutText" class="form-control">{{ old('AboutText') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="ServiceIconId" class="form-label">Service Icon</label>
                <select name="ServiceIconId" id="ServiceIconId" class="form-control @error('ServiceIconId') is-invalid @enderror">
                    <option value="">Select an icon</option>
                    @foreach($serviceIcons as $icon)
                        <option value="{{ $icon->id }}" {{ old('ServiceIconId') == $icon->id ? 'selected' : '' }}>{{ $icon->IconName }}</option>
                    @endforeach
                </select>
                @error('ServiceIconId')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-create">Add Service</button>
        </form>
    </div>
@endsection
