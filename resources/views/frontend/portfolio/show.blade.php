@extends('layouts.frontend')

@section('title', $portfolio->Title)

@section('content')
    <!-- Portfolio Detail Section -->
    <section class="section portfolio-detail-section">
        <div class="container">
            <!-- Başlık -->
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold" style="color: #1E90FF;">{{ $portfolio->Title }}</h2>
            </div>

            <!-- İçerik -->
            <div class="row align-items-center">
                <!-- Görsel -->
                <div class="col-md-6">
                    @if ($portfolio->projectMedia->first())
                        <img src="{{ asset('storage/' . $portfolio->projectMedia->first()->media_path) }}" alt="{{ $portfolio->Title }}" class="img-fluid rounded shadow-sm">
                    @else
                        <div class="bg-light rounded text-center p-5">
                            <p class="text-muted">No image available.</p>
                        </div>
                    @endif
                </div>
                <!-- Açıklama -->
                <div class="col-md-6">
                    <div class="portfolio-detail-content p-4 rounded shadow-sm bg-white">
                        <h4 class="fw-semibold mb-3">Project Details</h4>
                        <p class="text-muted">{{ $portfolio->Description ?? 'No description available.' }}</p>
                    </div>
                </div>
            </div>

            <!-- Geri Dön Butonu -->
            <div class="text-center mt-5">
                <a href="{{ route('portfolio.index') }}" class="btn btn-primary btn-lg px-4 py-2">
                    <i class="bi bi-arrow-left me-2"></i> Back to Portfolio
                </a>
            </div>
        </div>
    </section>
@endsection
