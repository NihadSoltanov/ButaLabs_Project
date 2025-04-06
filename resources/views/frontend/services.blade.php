@extends('layouts.frontend')

@section('title', 'Our Services')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Our Services</h1>
            <p>Explore the wide range of services we offer to help your business grow.</p>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section">
        <div class="container">
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <!-- Bootstrap 5 İkonu -->
                                <i class="bi {{ $service->Icon }} mb-3" style="font-size: 2.5rem; color: #1E90FF;"></i>
                                <h5 class="card-title">{{ $service->Title }}</h5>
                                <p class="card-text">{{ $service->Text }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
