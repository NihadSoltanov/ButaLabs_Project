@extends('layouts.frontend')

@section('title', 'Our Portfolio')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Our Portfolio</h1>
            <p>Check out some of our recent projects.</p>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="section">
        <div class="container">
            <div class="row">
                @foreach ($portfolios as $portfolio)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if ($portfolio->projectMedia->first())
                                <img src="{{ asset('storage/' . $portfolio->projectMedia->first()->media_path) }}" alt="{{ $portfolio->Title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $portfolio->Title }}</h5>
                                <p class="card-text">{{ $portfolio->Description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
