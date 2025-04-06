@extends('layouts.frontend')

@section('title', 'Our Partners')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Our Partners</h1>
            <p>We are proud to collaborate with these amazing partners.</p>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="section">
        <div class="container">
            <div class="row">
                @foreach ($partners as $partner)
                    <div class="col-md-2 mb-4">
                        <img src="{{ asset('storage/' . $partner->Logo) }}" alt="{{ $partner->Name }}" class="img-fluid">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
