<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $madrasah->nama ?? 'Madrasah' }} | PPDB</title>

    <!-- CSS Vendor -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

    <style>
    /* Navbar Keren */
    .navbar {
        transition: all 0.4s ease;
        background-color: rgba(255,255,255,0.8);
        backdrop-filter: blur(8px);
    }

    .navbar.scrolled {
        background-color: #fff;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .navbar-nav {
        margin-left: auto; /* Pindah ke kanan */
    }

    .navbar .nav-link {
        position: relative;
        font-weight: 500;
        color: #333;
        margin: 0 10px;
        transition: color 0.3s ease;
    }

    .navbar .nav-link:hover {
        color: #007bff;
    }

    .navbar .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        left: 0;
        bottom: -5px;
        background-color: #007bff;
        transition: width 0.3s ease;
    }

    .navbar .nav-link:hover::after {
        width: 100%;
    }

    .navbar-brand img {
        margin-right: 10px;
    }
    </style>
</head>
<body>

<!-- Navbar Modern -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ URL::to('/') }}/logo_madrasah/{{ $madrasah->logo ?? 'default-logo.png' }}" width="35">
            {{ $madrasah->nama ?? 'Nama Madrasah' }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ url('/ppdb') }}" class="nav-link">PPDB</a></li>
                <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="container mt-5 pt-5">
    @yield('content')
</main>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <small>&copy; {{ date('Y') }} {{ $madrasah->nama ?? 'Madrasah' }}</small>
</footer>

<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
// Navbar Scroll Effect
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if(window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});
</script>

</body>
</html>
