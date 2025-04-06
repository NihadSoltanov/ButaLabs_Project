@extends('layouts.frontend')

@section('title', 'Portfolio')

@section('content')
    <!-- Portfolio Section -->
    <section class="section">
        <div class="container">
            <h2>Our Portfolio</h2>
            <div class="row">
                @foreach ($portfolios as $portfolio)
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('portfolio.show', $portfolio) }}" class="text-decoration-none">
                            <div class="card portfolio-card">
                                @if ($portfolio->projectMedia->first())
                                    <img src="{{ asset('storage/' . $portfolio->projectMedia->first()->media_path) }}" alt="{{ $portfolio->Title }}" class="card-img-top">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $portfolio->Title }}</h5>
                                    <p class="card-text">{{ Str::limit($portfolio->Description, 100) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
