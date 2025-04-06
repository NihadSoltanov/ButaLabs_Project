@extends('layouts.frontend')

@section('title', 'Our Team')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Our Team</h1>
            <p>Meet the talented individuals behind our success.</p>
        </div>
    </section>

    <!-- Team Section -->
    <section class="section">
        <div class="container">
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
@endsection
