@extends('layouts.frontend')

@section('title', $team->FullName)

@section('content')
    <!-- Team Member Detail Section -->
    <section class="section team-detail-section">
        <div class="container">
            <!-- Başlık -->
            <div class="text-center mb-5">
                <h2 class="display-4 fw-bold" style="color: #1E90FF;">{{ $team->FullName }}</h2>
            </div>

            <!-- İçerik -->
            <div class="row align-items-center">
                <!-- Görsel -->
                <div class="col-md-4 text-center">
                    <img src="{{ asset('storage/' . $team->Image) }}" alt="{{ $team->FullName }}" class="img-fluid rounded-circle shadow-sm" style="width: 200px; height: 200px; object-fit: cover;">
                </div>
                <!-- Açıklama -->
                <div class="col-md-8">
                    <div class="team-detail-content p-4 rounded shadow-sm bg-white">
                        <h4 class="fw-semibold mb-3">About {{ $team->FullName }}</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        @if ($team->Link)
                            <a href="{{ $team->Link }}" target="_blank" class="btn btn-primary mt-3">
                                <i class="bi bi-linkedin me-2"></i> View LinkedIn Profile
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Geri Dön Butonu -->
            <div class="text-center mt-5">
                <a href="{{ route('team.index') }}" class="btn btn-primary btn-lg px-4 py-2">
                    <i class="bi bi-arrow-left me-2"></i> Back to Team
                </a>
            </div>
        </div>
    </section>
@endsection
