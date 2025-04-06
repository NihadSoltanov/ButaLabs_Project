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
            min-height: 100vh; /* Sayfanın minimum yüksekliğini viewport yüksekliği kadar yap */
            display: flex;
            flex-direction: column;
        }
        /* Main içeriği esneterek footer'ı alta it */
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
            padding: 5rem 0;
            background-color: #fff;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1E90FF;
        }
        .hero-section p {
            font-size: 1.25rem;
            color: #666;
            max-width: 700px;
            margin: 0 auto;
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
            padding: 3rem 0;
            background-color: #212529;
            color: #adb5bd;
            text-align: center;
            flex-shrink: 0; /* Footer'ın küçülmesini engelle */
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
        /* Daha önceki adımlarda eklediğimiz CSS */
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
        /* Detay Sayfaları için Yeni CSS */
        .service-detail-section,
        .portfolio-detail-section,
        .team-detail-section,
        .partner-detail-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        .service-detail-content,
        .portfolio-detail-content,
        .team-detail-content,
        .partner-detail-content {
            border-left: 4px solid #1E90FF;
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

            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main>
    @yield('content')
</main>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <p>© {{ date('Y') }} Your Agency. All rights reserved.</p>
        <p>
            <a href="#">Privacy Policy</a> |
            <a href="#">Terms of Service</a> |

        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
