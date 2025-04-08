@extends('layouts.frontend')

@section('title', 'Our Partners')

@section('content')
    <!-- Partners Section -->
    <section class="section partners-section">
        <div class="container">
            <!-- Başlık -->
            <div class="text-center mb-5">
                <h2>Our Partners</h2>
                <p class="lead mx-auto">We are proud to collaborate with these amazing partners.</p>
            </div>

            <!-- Partner Listesi -->
            <div class="row justify-content-center">
                @forelse ($partners as $partner)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="partner-card text-center">
                            <div class="partner-logo-wrapper">
                                <img src="{{ asset('storage/' . $partner->Logo) }}" alt="{{ $partner->Name }}" class="partner-logo">
                            </div>
                            <h5 class="partner-name mt-3">{{ $partner->Name }}</h5>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No partners available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
