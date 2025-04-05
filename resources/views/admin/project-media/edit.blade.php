@extends('admin.layouts.app')

@section('title', 'Edit Project Media')

@section('content')
    <h1 class="mb-4">Edit Project Media</h1>
    <div class="card p-4">
        <form action="{{ route('admin.project-media.update', $projectMedium) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="MediaURL" class="form-label">Media URL</label>
                <input type="url" name="MediaURL" id="MediaURL" class="form-control @error('MediaURL') is-invalid @enderror" value="{{ old('MediaURL', $projectMedium->MediaURL) }}">
                @error('MediaURL')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ProjectId" class="form-label">Portfolio</label>
                <select name="ProjectId" id="ProjectId" class="form-control @error('ProjectId') is-invalid @enderror">
                    <option value="">Select a portfolio</option>
                    @foreach($portfolios as $portfolio)
                        <option value="{{ $portfolio->id }}" {{ old('ProjectId', $projectMedium->ProjectId) == $portfolio->id ? 'selected' : '' }}>{{ $portfolio->Heading }}</option>
                    @endforeach
                </select>
                @error('ProjectId')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-update">Update Project Media</button>
        </form>
    </div>
@endsection
