@extends('layouts.frontend')

@section('title', 'Team')

@section('content')
    <!-- Team Section -->
    <section class="section">
        <div class="container">
            <h2>Our Team</h2>
            <div class="row">
                @foreach ($teamMembers as $member)
                    <div class="col-md-3 mb-4">
                        <a href="{{ route('team.show', $member) }}" class="text-decoration-none">
                            <div class="card team-card">
                                <img src="{{ asset('storage/' . $member->Image) }}" alt="{{ $member->FullName }}" class="card-img-top">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $member->FullName }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
