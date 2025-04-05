@extends('admin.layouts.app')

@section('title', 'Edit Home Page')

@section('content')
    <h1 class="mb-4">Edit Home Page</h1>
    <div class="card p-4">
        <form action="{{ route('admin.home-pages.update', $homePage) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="MainText" class="form-label">Main Text</label>
                <input type="text" name="MainText" id="MainText" class="form-control @error('MainText') is-invalid @enderror" value="{{ old('MainText', $homePage->MainText) }}">
                @error('MainText')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="SubMainText" class="form-label">Sub Main Text</label>
                <input type="text" name="SubMainText" id="SubMainText" class="form-control" value="{{ old('SubMainText', $homePage->SubMainText) }}">
            </div>
            <div class="mb-3">
                <label for="DescriptionTitle" class="form-label">Description Title</label>
                <input type="text" name="DescriptionTitle" id="DescriptionTitle" class="form-control" value="{{ old('DescriptionTitle', $homePage->DescriptionTitle) }}">
            </div>
            <div class="mb-3">
                <label for="ShortDescription" class="form-label">Short Description</label>
                <input type="text" name="ShortDescription" id="ShortDescription" class="form-control" value="{{ old('ShortDescription', $homePage->ShortDescription) }}">
            </div>
            <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <textarea name="Description" id="Description" class="form-control">{{ old('Description', $homePage->Description) }}</textarea>
            </div>
            <button type="submit" class="btn btn-update">Update Home Page</button>
        </form>
    </div>
@endsection
