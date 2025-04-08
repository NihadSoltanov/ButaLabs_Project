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
                <!-- Medya (Görsel/Video) -->
                <div class="col-md-6">
                    @if ($portfolio->projectMedia->isNotEmpty())
                        @if ($portfolio->projectMedia->count() == 1)
                            <!-- Sadece 1 medya varsa, statik olarak göster -->
                            @php
                                $media = $portfolio->projectMedia->first();
                            @endphp
                            @if ($media->media_type == 'image')
                                <img src="{{ asset('storage/' . $media->media_path) }}" class="d-block w-100 rounded shadow-sm" alt="{{ $portfolio->Title }}" style="height: 400px; object-fit: cover;">
                            @elseif ($media->media_type == 'video')
                                <video controls class="d-block w-100 rounded shadow-sm" style="height: 400px; object-fit: cover;">
                                    <source src="{{ asset('storage/' . $media->media_path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        @else
                            <!-- Birden fazla medya varsa, slideshow kullan -->
                            <div id="portfolioCarousel" class="carousel slide" data-bs-ride="carousel">
                                <!-- Carousel Indicators -->
                                <div class="carousel-indicators">
                                    @foreach ($portfolio->projectMedia as $index => $media)
                                        <button type="button" data-bs-target="#portfolioCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                                    @endforeach
                                </div>

                                <!-- Carousel Items -->
                                <div class="carousel-inner">
                                    @foreach ($portfolio->projectMedia as $index => $media)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            @if ($media->media_type == 'image')
                                                <img src="{{ asset('storage/' . $media->media_path) }}" class="d-block w-100 rounded shadow-sm" alt="{{ $portfolio->Title }} - Slide {{ $index + 1 }}" style="height: 400px; object-fit: cover;">
                                            @elseif ($media->media_type == 'video')
                                                <video controls class="d-block w-100 rounded shadow-sm" style="height: 400px; object-fit: cover;">
                                                    <source src="{{ asset('storage/' . $media->media_path) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Carousel Controls -->
                                <button class="carousel-control-prev" type="button" data-bs-target="#portfolioCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#portfolioCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="bg-light rounded text-center p-5">
                            <p class="text-muted">No media available.</p>
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
