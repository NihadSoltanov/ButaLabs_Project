@extends('layouts.frontend')

@section('title', 'About Us')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>About Us</h1>
            <p>{{ $about->Text ?? 'We are a leading digital agency in Azerbaijan, providing top-notch services to our clients since 2004.' }}</p>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3>800+</h3>
                    <p>Projects Completed</p>
                </div>
                <div class="col-md-3">
                    <h3>32</h3>
                    <p>Team Members</p>
                </div>
                <div class="col-md-3">
                    <h3>21+</h3>
                    <p>Years of Experience</p>
                </div>
                <div class="col-md-3">
                    <h3>9</h3>
                    <p>Awards Won</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="section">
        <div class="container">
            <h2>Our Workspace</h2>
            <div class="row">
                @if ($about && $about->aboutImages->isNotEmpty())
                    @foreach ($about->aboutImages as $media)
                        <div class="col-md-3 mb-4">
                            @if ($media->media_type == 'image')
                                <img src="{{ asset('storage/' . $media->media_path) }}" alt="Workspace" class="img-fluid rounded">
                            @elseif ($media->media_type == 'video')
                                <video controls class="img-fluid rounded">
                                    <source src="{{ asset('storage/' . $media->media_path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </div>
                    @endforeach
                @else
                    <p>No workspace media available.</p>
                @endif
            </div>
        </div>
    </section>
@endsection
