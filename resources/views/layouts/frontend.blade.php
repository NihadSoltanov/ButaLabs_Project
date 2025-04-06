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
            font-size: 16px; /* Font boyutunu artırdık */
            line-height: 1.6; /* Satır aralığını artırdık */
        }
        .navbar {
            padding: 1rem 2rem;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-size: 1.75rem; /* Logo font boyutunu artırdık */
            font-weight: 700;
            color: #1E90FF; /* Dodger Blue */
        }
        .navbar-nav .nav-link {
            color: #666;
            font-weight: 500;
            margin-left: 1rem;
            transition: color 0.3s ease;
            font-size: 1.1rem; /* Nav link font boyutunu artırdık */
        }
        .navbar-nav .nav-link:hover {
            color: #1E90FF; /* Dodger Blue */
        }
        .navbar .btn-primary {
            background-color: #1E90FF; /* Dodger Blue */
            border: none;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            font-size: 1.1rem; /* Buton font boyutunu artırdık */
        }
        .navbar .btn-primary:hover {
            background-color: #1873CC; /* Koyu Dodger Blue */
        }
        .hero-section {
            padding: 5rem 0;
            background-color: #fff;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem; /* Başlık font boyutunu artırdık */
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1E90FF; /* Dodger Blue */
        }
        .hero-section p {
            font-size: 1.25rem; /* Paragraf font boyutunu artırdık */
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
            font-size: 2.5rem; /* İstatistik başlık font boyutunu artırdık */
            font-weight: 700;
            color: #1E90FF; /* Dodger Blue */
        }
        .stats-section p {
            font-size: 1.1rem; /* İstatistik açıklama font boyutunu artırdık */
            color: #666;
            margin-bottom: 0;
        }
        .section {
            padding: 5rem 0;
        }
        .section h2 {
            font-size: 2.5rem; /* Bölüm başlık font boyutunu artırdık */
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
            color: #1E90FF; /* Dodger Blue */
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
            font-size: 1.5rem; /* Kart başlık font boyutunu artırdık */
            font-weight: 600;
            color: #212529;
        }
        .card-text {
            color: #666;
            font-size: 1.1rem; /* Kart açıklama font boyutunu artırdık */
        }
        .btn-primary {
            background-color: #1E90FF; /* Dodger Blue */
            border: none;
        }
        .btn-primary:hover {
            background-color: #1873CC; /* Koyu Dodger Blue */
        }
        .footer {
            padding: 3rem 0;
            background-color: #212529;
            color: #adb5bd;
            text-align: center;
        }
        .footer a {
            color: #adb5bd;
            text-decoration: none;
            margin: 0 0.5rem;
        }
        .footer a:hover {
            color: #1E90FF; /* Dodger Blue */
        }
        .footer p {
            font-size: 1.1rem; /* Footer font boyutunu artırdık */
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
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('services') }}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('portfolio') }}">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('team') }}">Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('partners') }}">Partners</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white" href="#">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
@yield('content')

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <p>© {{ date('Y') }} Your Agency. All rights reserved.</p>
        <p>
            <a href="#">Privacy Policy</a> |
            <a href="#">Terms of Service</a> |
            <a href="#">Contact Us</a>
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
