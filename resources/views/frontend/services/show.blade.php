@extends('layouts.frontend')

@section('title', $service->Name)

@section('content')
    <!-- Service Detail Section -->
    <section class="section service-detail-section">
        <div class="container">
            <!-- Başlık -->
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold" style="color: #1E90FF;">{{ $service->Name }}</h2>
                <p class="lead text-muted">{{ $service->shortDesc ?? 'No short description available.' }}</p>
            </div>

            <!-- İçerik -->
            <div class="row align-items-center">
                <!-- İkon veya Görsel -->
                <div class="col-md-4 text-center">
                    @if ($service->serviceIcon && $service->serviceIcon->IconName)
                        <i class="bi {{ $service->serviceIcon->IconName }}" style="font-size: 6rem; color: #1E90FF;"></i>
                    @else
                        <i class="bi bi-gear" style="font-size: 6rem; color: #1E90FF;"></i> <!-- Varsayılan ikon -->
                    @endif
                </div>
                <!-- Açıklama -->
                <div class="col-md-8">
                    <div class="service-detail-content p-4 rounded shadow-sm bg-white">
                        <h4 class="fw-semibold mb-3">{{ $service->AboutTitle ?? 'About ' . $service->Name }}</h4>
                        <p class="text-muted">{{ $service->AboutText ?? 'No detailed description available.' }}</p>
                    </div>
                </div>
            </div>

            <!-- Geri Dön Butonu -->
            <div class="text-center mt-5">
                <a href="{{ route('services.index') }}" class="btn btn-primary btn-lg px-4 py-2">
                    <i class="bi bi-arrow-left me-2"></i> Back to Services
                </a>
            </div>
        </div>
    </section>
@endsection
