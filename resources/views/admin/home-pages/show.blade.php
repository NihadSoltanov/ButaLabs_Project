@extends('admin.layouts.app')

@section('title', 'View Home Page')

@section('content')
    <h1 class="mb-4">Home Page Details</h1>
    <div class="card p-4">
        <h5 class="card-title">{{ $homePage->MainText }}</h5>
        <p><strong>Sub Main Text:</strong> {{ $homePage->SubMainText }}</p>
        <p><strong>Description Title:</strong> {{ $homePage->DescriptionTitle }}</p>
        <p><strong>Short Description:</strong> {{ $homePage->ShortDescription }}</p>
        <p><strong>Description:</strong> {{ $homePage->Description }}</p>
    </div>
    <a href="{{ route('admin.home-pages.index') }}" class="btn btn-secondary mt-3">Back to Home Pages</a>
@endsection
