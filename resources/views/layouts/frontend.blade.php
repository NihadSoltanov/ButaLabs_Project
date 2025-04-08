<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Your Agency</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            font-size: 16px;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0; /* Body'nin margin'ini sıfırlıyoruz */
            padding: 0; /* Body'nin padding'ini sıfırlıyoruz */
        }
        main {
            flex: 1 0 auto;
        }
        .navbar {
            padding: 1rem 2rem;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1E90FF;
        }
        .footer .container {
            padding-bottom: 0; /* Container'ın alt padding'ini sıfırlıyoruz */
            margin-bottom: 0; /* Container'ın alt margin'ini sıfırlıyoruz */
        }

        .footer .row {
            margin-bottom: 0; /* Row'un alt margin'ini sıfırlıyoruz */
        }
        .navbar-nav .nav-link {
            color: #666;
            font-weight: 500;
            margin-left: 1rem;
            transition: color 0.3s ease;
            font-size: 1.1rem;
        }
        .navbar-nav .nav-link:hover {
            color: #1E90FF;
        }
        .navbar .btn-primary {
            background-color: #1E90FF;
            border: none;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            font-size: 1.1rem;
        }
        .navbar .btn-primary:hover {
            background-color: #1873CC;
        }
        .hero-section {
            padding: 8rem 0;
            background: linear-gradient(135deg, #e6f0fa 0%, #ffffff 100%);
            min-height: 600px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(30, 144, 255, 0.1) 0%, transparent 70%);
            z-index: 0;
        }
        .hero-section .row {
            align-items: center;
            position: relative;
            z-index: 1;
        }
        .hero-text {
            position: relative;
            z-index: 2;
            padding-left: 2rem;
        }
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #1E90FF;
            display: inline-block;
            position: relative;
        }
        /* İmleç (caret) için stil */
        .hero-section h1:not(.finished)::after {
            content: '';
            position: absolute;
            right: -0.15em;
            top: 0;
            width: 0.15em;
            height: 1em;
            background-color: #1E90FF;
            animation: blink-caret 0.75s step-end infinite;
        }
        @keyframes blink-caret {
            from, to { background-color: transparent; }
            50% { background-color: #1E90FF; }
        }
        .hero-section p {
            font-size: 1.25rem;
            color: #555;
            max-width: 500px;
            margin: 0;
            line-height: 1.8;
        }
        .hero-section .btn-primary {
            background-color: #1E90FF;
            border: none;
            padding: 0.75rem 2rem;
            font-size: 1.1rem;
            font-weight: 500;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .hero-section .btn-primary:hover {
            background-color: #1873CC;
            transform: translateY(-2px);
        }
        /* SVG Şekil için Stil */
        .hero-svg-container {
            position: relative;
            z-index: 1;
        }
        .hero-svg {
            max-width: 100%;
            height: auto;
            animation: pulse 2s infinite ease-in-out;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        /* Koşullu Metin için Stil */
        .space-warning {
            margin-top: 1rem;
            text-align: center;
        }
        .space-warning p {
            font-size: 1rem;
            color: #ff4444;
            margin: 0;
        }
        /* About Section için Stil */
        .about-section {
            padding: 5rem 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            position: relative;
        }
        .about-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(30, 144, 255, 0.05) 0%, transparent 70%);
            z-index: 0;
        }
        .about-section .container {
            position: relative;
            z-index: 1;
        }
        .about-section h2 {
            font-size: 3rem;
            font-weight: 700;
            color: #1E90FF;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }
        .about-section h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 4px;
            background-color: #1E90FF;
            border-radius: 2px;
        }
        .about-section h3 {
            font-size: 1.75rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 1rem;
        }
        .about-section p {
            font-size: 1.1rem;
            color: #666;
            line-height: 1.8;
        }
        .about-section .lead {
            font-size: 1.25rem;
            color: #555;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.8;
        }
        /* Ana Görsel/Video için Stil */
        .about-main-image {
            max-width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .about-main-image:hover {
            transform: scale(1.02);
        }
        /* Galeri Kartları için Stil */
        .gallery-card {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }
        .gallery-card img,
        .gallery-card video {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }
        /* Portfolio Detail Section için Stil */
        .portfolio-detail-section {
            padding: 5rem 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        }
        .portfolio-detail-section h2 {
            font-size: 3rem;
            font-weight: 700;
            color: #1E90FF;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }
        .portfolio-detail-section h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 4px;
            background-color: #1E90FF;
            border-radius: 2px;
        }
        .portfolio-detail-content {
            border-left: 4px solid #1E90FF;
        }
        /* Statik Medya için Stil (Tek Medya Durumu) */
        .portfolio-detail-section .static-media {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        /* Carousel için Stil */
        .carousel {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        .carousel-indicators {
            bottom: -50px;
        }
        .carousel-indicators button {
            background-color: #1E90FF;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin: 0 5px;
        }
        .carousel-indicators .active {
            background-color: #1873CC;
        }
        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
            background: rgba(0, 0, 0, 0.3);
            transition: background 0.3s ease;
        }
        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background: rgba(0, 0, 0, 0.5);
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-size: 50%;
        }
        /* Partners Section için Stil */
        .partners-section {
            padding: 5rem 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            position: relative;
        }
        .partners-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(30, 144, 255, 0.05) 0%, transparent 70%);
            z-index: 0;
        }
        .partners-section .container {
            position: relative;
            z-index: 1;
        }
        .partners-section h2 {
            font-size: 3rem;
            font-weight: 700;
            color: #1E90FF;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }
        .partners-section h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 4px;
            background-color: #1E90FF;
            border-radius: 2px;
        }
        .partners-section .lead {
            font-size: 1.25rem;
            color: #555;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.8;
        }
        /* Partner Kartları için Stil */
        .partner-card {
            padding: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .partner-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }
        .partner-logo-wrapper {
            width: 120px;
            height: 120px;
            margin: 0 auto;
            border-radius: 50%;
            background-color: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .partner-logo {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 10px;
        }
        .partner-name {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 0;
        }
        /* Responsive Tasarım */
        @media (max-width: 767.98px) {
            .hero-section {
                padding: 4rem 0;
                min-height: auto;
            }
            .hero-section .row {
                flex-direction: column;
            }
            .hero-section .col-md-6 {
                width: 100%;
                margin-bottom: 2rem;
            }
            .hero-text {
                order: 1;
                text-align: center;
                padding-left: 0;
            }
            .hero-svg-container {
                order: 2;
            }
            .hero-section h1 {
                font-size: 2.5rem;
                white-space: normal;
                word-wrap: break-word;
            }
            .hero-section p {
                font-size: 1rem;
                max-width: 100%;
            }
            .hero-svg {
                width: 250px;
                height: 250px;
            }
            .hero-section .btn-primary {
                padding: 0.5rem 1.5rem;
                font-size: 1rem;
            }
            /* About Section için Responsive */
            .about-section {
                padding: 3rem 0;
            }
            .about-section h2 {
                font-size: 2rem;
            }
            .about-section h2::after {
                width: 40px;
            }
            .about-section h3 {
                font-size: 1.5rem;
            }
            .about-section .lead {
                font-size: 1.1rem;
            }
            .about-main-image {
                height: 250px;
            }
            .gallery-card img,
            .gallery-card video {
                height: 150px;
            }
            /* Portfolio Detail için Responsive */
            .portfolio-detail-section {
                padding: 3rem 0;
            }
            .portfolio-detail-section h2 {
                font-size: 2rem;
            }
            .portfolio-detail-section h2::after {
                width: 40px;
            }
            .carousel-item img,
            .carousel-item video {
                height: 300px;
            }
            .portfolio-detail-section .static-media img,
            .portfolio-detail-section .static-media video {
                height: 300px;
            }
            /* Partners Section için Responsive */
            .partners-section {
                padding: 3rem 0;
            }
            .partners-section h2 {
                font-size: 2rem;
            }
            .partners-section h2::after {
                width: 40px;
            }
            .partners-section .lead {
                font-size: 1.1rem;
            }
            .partner-logo-wrapper {
                width: 100px;
                height: 100px;
            }
            .partner-name {
                font-size: 1.1rem;
            }
        }
        .stats-section {
            padding: 3rem 0;
            background-color: #f8f9fa;
            text-align: center;
        }
        .stats-section h3 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1E90FF;
        }
        .stats-section p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 0;
        }
        .section {
            padding: 5rem 0;
        }
        .section h2 {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
            color: #1E90FF;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            object-fit: cover;
            height: 200px;
            width: 100%;
        }
        .card-body {
            padding: 1.5rem;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #212529;
        }
        .card-text {
            color: #666;
            font-size: 1.1rem;
        }
        .btn-primary {
            background-color: #1E90FF;
            border: none;
        }
        .btn-primary:hover {
            background-color: #1873CC;
        }
        .footer {
            padding: 2rem 0; /* Padding'i koruyoruz */
            background-color: #212529;
            color: #adb5bd;
            text-align: center;
            flex-shrink: 0;
            margin-bottom: 0; /* Alt boşluğu sıfırlıyoruz */
            width: 100%; /* Footer'ın genişliğini tam yapıyoruz */
        }
        .footer a {
            color: #adb5bd;
            text-decoration: none;
            margin: 0 0.5rem;
        }
        .footer a:hover {
            color: #1E90FF;
        }
        .footer p {
            font-size: 1.1rem;
        }
        .service-card,
        .portfolio-card,
        .team-card,
        .partner-card {
            transition: transform 0.2s ease-in-out;
        }
        .service-card:hover,
        .portfolio-card:hover,
        .team-card:hover,
        .partner-card:hover {
            transform: scale(1.05);
            cursor: pointer;
        }
        a {
            cursor: pointer;
        }
        .btn {
            cursor: pointer;
        }
        .service-detail-section,
        .portfolio-detail-section,
        .team-detail-section,
        .partner-detail-section,
        .contact-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        .service-detail-content,
        .portfolio-detail-content,
        .team-detail-content,
        .partner-detail-content,
        .contact-info,
        .contact-form {
            border-left: 4px solid #1E90FF;
        }
        .contact-info i {
            color: #1E90FF;
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Your Agency</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('services.index') }}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('portfolio.index') }}">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('team.index') }}">Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('partners.index') }}">Partners</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main>
    @yield('content')
</main>

<footer class="footer">
    <div class="container">
        <div class="row">
            <!-- Şirket Bilgileri -->
            <div class="col-md-6 text-center text-md-start mb-4">
                <h5 class="text-white fw-bold mb-3">Your Agency</h5>
                <p><i class="bi bi-geo-alt-fill me-2"></i>Baku, Azerbaijan</p>
                <p><i class="bi bi-envelope-fill me-2"></i>info@youragency.com</p>
                <p><i class="bi bi-telephone-fill me-2"></i>+994 12 345 67 89</p>
            </div>
            <!-- Sosyal Medya ve Abonelik -->
            <div class="col-md-6 text-center text-md-end mb-4">
                <h5 class="text-white fw-bold mb-3">Follow Us</h5>
                <p>
                    <a href="#" class="me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="me-3"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </p>
                <h5 class="text-white fw-bold mb-3">Newsletter</h5>
                <form>
                    <input type="email" class="form-control mb-2" placeholder="Your Email" required>
                    <button type="submit" class="btn btn-primary w-100">Subscribe</button>
                </form>
            </div>
        </div>
        <hr class="bg-light">
        <div class="row">
            <div class="col-12 text-center">
                <p>© {{ date('Y') }} Your Agency. All rights reserved. |
                    <a href="#">Privacy Policy</a> |
                    <a href="#">Terms of Service</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // JavaScript ile Typewriter Efekti
    function typeWriter() {
        const textElement = document.getElementById('typewriter-text');
        if (!textElement) return; // Eğer typewriter-text ID'si yoksa fonksiyonu durdur
        const text = textElement.textContent;
        textElement.textContent = ''; // Başlangıçta metni temizle
        let i = 0;

        function type() {
            if (i < text.length) {
                textElement.textContent += text.charAt(i);
                i++;
                setTimeout(type, 100); // Her karakter için 100ms bekle
            } else {
                // Animasyon bittiğinde imleci kaldır
                textElement.classList.add('finished');
            }
        }

        type(); // Animasyonu başlat
    }

    // Sayfa yüklendiğinde typewriter efektini başlat
    window.addEventListener('load', typeWriter);

    // Ekran genişliğini kontrol ederek metni göster/gizle
    function checkSpace() {
        const heroText = document.querySelector('.hero-text');
        const heroSvgContainer = document.querySelector('.hero-svg-container');
        if (!heroText || !heroSvgContainer) return; // Eğer bu elementler yoksa fonksiyonu durdur
        const spaceWarning = document.querySelector('.space-warning');
        const windowWidth = window.innerWidth;

        // Eğer ekran genişliği 767px'den küçükse (mobil cihazlar için)
        if (windowWidth <= 767) {
            // Hero Text ve SVG Container'ın genişliklerini kontrol et
            const heroTextWidth = heroText.offsetWidth;
            const heroSvgWidth = heroSvgContainer.offsetWidth;

            // Eğer SVG'nin genişliği metnin genişliğini sıkıştırıyorsa
            if (heroSvgWidth > windowWidth * 0.5) { // SVG genişliği ekranın yarısından büyükse
                spaceWarning.style.display = 'block';
            } else {
                spaceWarning.style.display = 'none';
            }
        } else {
            spaceWarning.style.display = 'none'; // Masaüstü görünümde metni gizle
        }
    }

    // Sayfa yüklendiğinde ve ekran boyutu değiştiğinde kontrol et
    window.addEventListener('load', checkSpace);
    window.addEventListener('resize', checkSpace);
</script>
</body>
</html>
