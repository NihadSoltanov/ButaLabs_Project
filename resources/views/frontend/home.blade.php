@extends('layouts.frontend')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Welcome to Your Agency</h1>
            <p>We are a leading digital agency in Azerbaijan, providing top-notch services to our clients.</p>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3>800+</h3>
                    <p>Projects Completed</p>
                </div>
                <div class="col-md-3">
                    <h3>32</h3>
                    <p>Team Members</p>
                </div>
                <div class="col-md-3">
                    <h3>21+</h3>
                    <p>Years of Experience</p>
                </div>
                <div class="col-md-3">
                    <h3>9</h3>
                    <p>Awards Won</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section">
        <div class="container">
            <h2>Our Services</h2>
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <i class="bi {{ $service->Icon }} mb-3" style="font-size: 2.5rem; color: #1E90FF;"></i>
                                <h5 class="card-title">{{ $service->Title }}</h5>
                                <p class="card-text">{{ Str::limit($service->Text, 100) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="section bg-light">
        <div class="container">
            <h2>Our Portfolio</h2>
            <div class="row">
                @foreach ($portfolios as $portfolio)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if ($portfolio->projectMedia->first())
                                <img src="{{ asset('storage/' . $portfolio->projectMedia->first()->media_path) }}" alt="{{ $portfolio->Title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $portfolio->Title }}</h5>
                                <p class="card-text">{{ Str::limit($portfolio->Description, 100) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('portfolio') }}" class="btn btn-primary">View All Projects</a>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="section">
        <div class="container">
            <h2>Our Team</h2>
            <div class="row">
                @foreach ($teamMembers as $member)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $member->Image) }}" alt="{{ $member->FullName }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $member->FullName }}</h5>
                                @if ($member->Link)
                                    <a href="{{ $member->Link }}" target="_blank" class="btn btn-primary btn-sm">LinkedIn</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="section bg-light">
        <div class="container">
            <h2>Our Partners</h2>
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
