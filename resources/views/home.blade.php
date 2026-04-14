<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesona Karangasem - Bali</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Hero Section dengan Gambar */
        .hero {
            background-image: url('/images/karangasem-background.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
        }
        
        /* Lapisan gelap di atas gambar */
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        
        /* Konten di atas lapisan gelap */
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            padding: 20px;
        }
        
        .hero h1 {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        
        .hero p {
            font-size: 1.8rem;
            margin-bottom: 2.5rem;
            line-height: 1.6;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }
        
        .btn-custom {
            background-color: white;
            color: #333;
            padding: 15px 50px;
            font-size: 1.3rem;
            text-decoration: none;
            border-radius: 50px;
            display: inline-block;
            font-weight: 600;
            transition: all 0.3s;
            border: 2px solid white;
        }
        
        .btn-custom:hover {
            background-color: transparent;
            color: white;
            transform: scale(1.05);
        }
        
        .btn-custom i {
            margin-right: 10px;
        }
        
        /* Navbar - AWALNYA TRANSPARAN */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: transparent !important;
            padding: 20px 0;
            transition: all 0.3s ease;
        }
        
        /* Navbar saat di-scroll - MENJADI SOLID BIRU */
        .navbar.scrolled {
            background-color: #0d6efd !important;
            padding: 10px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        
        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: white !important;
        }
        
        .nav-link {
            color: white !important;
            font-size: 1.1rem;
            margin: 0 10px;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            opacity: 0.8;
        }
        
        /* Dropdown menu styling */
        .dropdown-menu {
            background-color: #0d6efd;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .dropdown-item {
            color: white;
        }
        
        .dropdown-item:hover {
            background-color: #0b5ed7;
            color: white;
        }
        
        .dropdown-item form button {
            color: white;
        }
        
        /* Card styling */
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        
        /* Map container styling */
        .map-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            height: 100%;
            min-height: 350px;
        }
        
        .map-container iframe {
            width: 100%;
            height: 100%;
            min-height: 350px;
            border: 0;
        }
        
        /* Section tentang */
        .about-section {
            padding: 80px 0;
        }
        
        .about-text {
            padding-right: 30px;
        }
        
        .about-text h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #333;
        }
        
        .about-text .lead {
            font-size: 1.2rem;
            color: #0d6efd;
            margin-bottom: 20px;
        }
        
        .about-text p {
            font-size: 1rem;
            line-height: 1.8;
            color: #555;
            margin-bottom: 20px;
        }
        
        .destinasi-list {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }
        
        .destinasi-list li {
            display: inline-block;
            background: #e9ecef;
            padding: 8px 15px;
            margin: 5px;
            border-radius: 20px;
            font-size: 0.9rem;
            color: #0d6efd;
        }
        
        .destinasi-list li i {
            margin-right: 5px;
            color: #0d6efd;
        }
        
        /* Alert styling */
        .alert-fixed {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 9999;
            animation: slideIn 0.5s ease;
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        /* Footer Styles */
        .footer {
            background-color: #1a1a2e;
            color: #eee;
            padding: 60px 0 30px;
        }
        
        .footer h5 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 1.2rem;
            font-weight: 600;
        }
        
        .footer hr {
            background-color: #0d6efd;
            width: 50px;
            height: 2px;
            margin: 0 0 20px 0;
            opacity: 1;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s;
            text-decoration: none;
        }
        
        .social-icon:hover {
            transform: translateY(-3px);
            background-color: #0d6efd;
        }
        
        .footer-contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 15px;
            color: #ccc;
        }
        
        .footer-contact-item i {
            width: 30px;
            color: #0d6efd;
            font-size: 1.1rem;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 12px;
        }
        
        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: all 0.3s;
            font-size: 0.9rem;
        }
        
        .footer-links a:hover {
            color: #0d6efd;
            padding-left: 5px;
        }
        
        .copyright {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 25px;
            margin-top: 40px;
            text-align: center;
            font-size: 0.8rem;
            color: #888;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.2rem;
            }
            
            .btn-custom {
                padding: 12px 30px;
                font-size: 1.1rem;
            }
            
            .navbar-brand {
                font-size: 1.2rem;
            }
            
            .about-text {
                padding-right: 0;
                margin-bottom: 30px;
            }
            
            .about-section {
                padding: 50px 0;
            }
            
            .about-text h2 {
                font-size: 1.8rem;
            }
            
            .map-container {
                min-height: 300px;
            }
            
            .footer {
                text-align: center;
            }
            
            .footer hr {
                margin: 0 auto 20px auto;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="fas fa-umbrella-beach me-2"></i>Pesona Karangasem
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#destinasi">Destinasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tentang">Tentang</a>
                </li>
                
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user me-2"></i> Profil Saya
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-history me-2"></i> Riwayat Kunjungan
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item" style="border: none; background: none; width: 100%; text-align: left;">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white px-3 rounded" href="{{ route('register') }}" style="background: #0d6efd;">
                            <i class="fas fa-user-plus me-1"></i> Daftar
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Alert Notifikasi -->
@if(session('success'))
<div class="alert alert-success alert-fixed alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-fixed alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Selamat Datang di Karangasem</h1>
        <p>Jelajahi keindahan alam dan budaya Bali bagian timur</p>
        <a href="#destinasi" class="btn-custom">
            <i class="fas fa-arrow-down"></i> Lihat Destinasi
        </a>
    </div>
</section>

<!-- Destinasi Section -->
<section id="destinasi" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Destinasi Wisata Populer</h2>
        <div class="row">
            @foreach($wisata as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    <img src="{{ $item['gambar'] }}" class="card-img-top" alt="{{ $item['nama'] }}" onerror="this.src='https://via.placeholder.com/300x200?text=No+Image'">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['nama'] }}</h5>
                        <p class="card-text text-muted">
                            <i class="fas fa-map-marker-alt"></i> {{ $item['lokasi'] }}
                        </p>
                        <p class="card-text">{{ Str::limit($item['deskripsi'], 100) }}</p>
                        <a href="/destinasi/{{ $item['id'] }}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Tentang Section -->
<section id="tentang" class="about-section bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 about-text">
                <h2>
                    <i class="fas fa-landmark text-primary me-2"></i>
                    Tentang Karangasem
                </h2>
                <p class="lead">Kabupaten Karangasem adalah salah satu kabupaten di provinsi Bali, Indonesia yang menyimpan pesona alam dan budaya yang luar biasa.</p>
                <p>Dengan luas wilayah 839,54 km², Karangasem memiliki berbagai destinasi wisata menarik seperti pura-pura bersejarah, pantai eksotis, bukit dengan pemandangan menakjubkan, dan taman air yang indah.</p>
                <p>Karangasem dikenal sebagai kawasan dengan kekayaan budaya yang masih terjaga, mulai dari upacara adat hingga peninggalan kerajaan. Destinasi wisata unggulannya menjadi daya tarik utama bagi wisatawan domestik maupun mancanegara.</p>
                
                <ul class="destinasi-list">
                    <li><i class="fas fa-temple"></i> Pura Besakih</li>
                    <li><i class="fas fa-water"></i> Tirta Gangga</li>
                    <li><i class="fas fa-umbrella-beach"></i> Pantai Amed</li>
                    <li><i class="fas fa-mountain"></i> Bukit Asah</li>
                    <li><i class="fas fa-temple"></i> Lempuyang Temple</li>
                    <li><i class="fas fa-landmark"></i> Istana Tampaksiring</li>
                </ul>
            </div>
            
            <div class="col-lg-6">
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31561.000000000004!2d115.4499818!3d-8.3739976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd21cbe3748b2b7%3A0xbfc39798cd1bb4a!2sBesakih%20Great%20Temple!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                        width="100%" 
                        height="350" 
                        style="border:0; border-radius: 15px;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
                <p class="text-muted mt-2 text-center">
                    <i class="fas fa-map-marker-alt text-danger"></i> Pura Besakih - Mother Temple of Bali
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5>Pesona Karangasem</h5>
                <hr>
                <p>Menjelajahi keindahan alam dan budaya Karangasem, Bali Timur.</p>
                <div class="social-links">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Link Cepat</h5>
                <hr>
                <ul class="footer-links">
                    <li><a href="#destinasi">Destinasi Wisata</a></li>
                    <li><a href="#tentang">Tentang Karangasem</a></li>
                    @auth
                        <li><a href="#">Profil Saya</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Daftar</a></li>
                    @endauth
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Kontak</h5>
                <hr>
                <div class="footer-contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Karangasem, Bali, Indonesia</span>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>info@pesonakarangasem.com</span>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-phone"></i>
                    <span>+62 123 4567 890</span>
                </div>
            </div>
        </div>
        <div class="copyright">
            <small>&copy; 2024 Pesona Karangasem. All rights reserved.</small>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        var navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
    
    // Auto close alert after 3 seconds
    setTimeout(function() {
        var alerts = document.querySelectorAll('.alert-fixed');
        alerts.forEach(function(alert) {
            var bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 3000);
</script>
</body>
</html>