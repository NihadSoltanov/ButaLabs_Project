@extends('layouts.frontend')

@section('title', 'About Us')

@section('content')
    <!-- About Section -->
    <section class="section about-section">
        <div class="container">
            <!-- Başlık ve Açıklama -->
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2>About Us</h2>
                    <p class="lead mx-auto">
                        {{ $about->Text ?? 'We are a leading digital agency in Azerbaijan, providing top-notch services to our clients since 2004.' }}
                    </p>
                </div>
            </div>

            <!-- Şirket Hakkında Detaylı Bilgi ve Medya -->
            <div class="row align-items-center mb-5">
                <div class="col-md-6 order-md-1 order-2">
                    <h3>Our Mission</h3>
                    <p>
                        At Your Agency, our mission is to empower businesses with innovative IT solutions that drive growth and success. We are committed to delivering exceptional services tailored to the unique needs of our clients, ensuring they stay ahead in the digital landscape.
                    </p>
                    <h3>Our Vision</h3>
                    <p>
                        We envision a future where technology seamlessly integrates with business strategies, creating opportunities for growth and transformation. Our goal is to be the trusted partner for companies in Azerbaijan and beyond, helping them navigate the digital world with confidence.
                    </p>
                </div>
                <div class="col-md-6 order-md-2 order-1 text-center mb-4 mb-md-0">
                    @if ($about && $about->aboutImages->isNotEmpty())
                        <!-- İlk medyayı büyük görsel olarak göster -->
                        @php
                            $firstMedia = $about->aboutImages->first();
                        @endphp
                        @if ($firstMedia->media_type == 'image')
                            <img src="{{ asset('storage/' . $firstMedia->media_path) }}" alt="About Us" class="img-fluid rounded shadow about-main-image">
                        @elseif ($firstMedia->media_type == 'video')
                            <video controls class="img-fluid rounded shadow about-main-image">
                                <source src="{{ asset('storage/' . $firstMedia->media_path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                    @else
                        <!-- Varsayılan bir görsel göster -->
                        <img src="https://via.placeholder.com/500x300?text=About+Us" alt="About Us" class="img-fluid rounded shadow about-main-image">
                    @endif
                </div>
            </div>

            <!-- Ek Medya (Galeri Şeklinde) -->
            @if ($about && $about->aboutImages->count() > 1)
                <div class="row">
                    @foreach ($about->aboutImages->slice(1) as $media)
                        <div class="col-md-4 mb-4">
                            <div class="gallery-card">
                                @if ($media->media_type == 'image')
                                    <img src="{{ asset('storage/' . $media->media_path) }}" alt="About Us" class="img-fluid rounded shadow">
                                @elseif ($media->media_type == 'video')
                                    <video controls class="img-fluid rounded shadow">
                                        <source src="{{ asset('storage/' . $media->media_path) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
