@extends('layouts.frontend')

@section('title', 'Services')

@section('content')
    <!-- Services Section -->
    <section class="section">
        <div class="container">
            <h2>Our Services</h2>
            <p class="text-center mb-4">Explore the wide range of services we offer to help your business grow.</p>
            <div class="row">
                @forelse ($services as $service)
                    <div class="col-md-3 mb-4">
                        <a href="{{ route('services.show', $service) }}" class="text-decoration-none">
                            <div class="card service-card">
                                <div class="card-body text-center">
                                    @if ($service->serviceIcon && $service->serviceIcon->IconName)
                                        <i class="bi {{ $service->serviceIcon->IconName }} mb-3" style="font-size: 2.5rem; color: #1E90FF;"></i>
                                    @else
                                        <i class="bi bi-gear mb-3" style="font-size: 2.5rem; color: #1E90FF;"></i> <!-- Varsayılan ikon -->
                                    @endif
                                    <h5 class="card-title">{{ $service->Name }}</h5>
                                    <p class="card-text">{{ $service->shortDesc ?? 'No description available.' }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">No services available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
