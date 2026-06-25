<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesona Karangasem</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
        .navbar {
            transition: background-color 0.3s ease;
        }
        .navbar.scrolled {
            background-color: #0d6efd !important;
        }
        .wisata-card {
            transition: transform 0.3s;
        }
        .wisata-card:hover {
            transform: scale(1.05);
        }
        .wisata-img {
            height: 200px;
            object-fit: cover;
        }
        .alert-fixed {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }
        /* ===== FOOTER STYLING ===== */
        footer {
            background-color: #0a0a0a !important;
        }
        footer,
        footer p,
        footer h5,
        footer h6,
        footer li,
        footer a,
        footer span,
        footer small,
        footer .text-muted {
            color: #ffffff !important;
        }
        footer a {
            text-decoration: none;
            transition: color 0.3s;
        }
        footer a:hover {
            color: #0d6efd !important;
            text-decoration: underline;
        }
        footer hr {
            background-color: rgba(255,255,255,0.15) !important;
        }
        .footer-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.08);
            transition: all 0.3s;
            color: #ffffff !important;
        }
        .footer-social a:hover {
            background-color: #0d6efd;
            transform: translateY(-3px);
            text-decoration: none !important;
        }
        .footer-map iframe {
            width: 100%;
            height: 200px;
            border-radius: 8px;
            border: 2px solid rgba(255,255,255,0.1);
            /* ===== INI YANG MEMBUAT MAP BISA DIGESER ===== */
            pointer-events: auto !important;
        }
        .footer-link {
            color: #ffffff !important;
        }
        .footer-link:hover {
            color: #0d6efd !important;
        }
        .footer-list li {
            margin-bottom: 8px;
        }
        .footer-list li i {
            color: #0d6efd;
            margin-right: 8px;
            font-size: 10px;
        }
        /* ===== PERBAIKAN: MAP BISA DIGESER ===== */
        .footer-map {
            position: relative;
        }
        .footer-map iframe {
            pointer-events: auto !important;
        }
    </style>
</head>
<body>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show alert-fixed" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Pesona Karangasem</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#destinasi">Destinasi</a>
                    </li>
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-outline-light text-white px-3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-outline-light px-3">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="hero-content">
            <h1 class="display-3 fw-bold">Pesona Karangasem</h1>
            <p class="lead">Temukan Keindahan Surga Tersembunyi di Bali Timur</p>
            <a href="#destinasi" class="btn btn-primary btn-lg">Jelajahi Sekarang</a>
        </div>
    </header>

    <section id="destinasi" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Destinasi Wisata Populer</h2>
            <div class="row g-4">
                @foreach ($wisata as $w)
                <div class="col-md-4">
                    <div class="card h-100 wisata-card shadow-sm">
                        <img src="{{ $w['gambar'] }}" class="card-img-top wisata-img" alt="{{ $w['nama'] }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $w['nama'] }}</h5>
                            <p class="text-muted mb-2"><i class="fas fa-map-marker-alt text-danger"></i> {{ $w['lokasi'] }}</p>
                            <p class="card-text text-secondary">{{ Str::limit($w['deskripsi'], 100) }}</p>
                            <div class="mt-auto pt-3">
                                <a href="{{ route('detail', $w['id']) }}" class="btn btn-primary w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ================= FITUR KOMENTAR ================= -->
    <section class="py-5 bg-light border-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-primary text-white py-3">
                            <h5 class="mb-0 fw-bold"><i class="fas fa-comments me-2"></i>Komentar Pengunjung</h5>
                        </div>
                        <div class="card-body p-4">
                            
                            @auth
                                <form action="{{ route('komentar.store') }}" method="POST" class="mb-4">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="wisata_id" class="form-label fw-bold text-secondary">Pilih Tempat Wisata:</label>
                                        <select name="wisata_id" id="wisata_id" class="form-select" required>
                                            <option value="" disabled selected>-- Pilih Wisata --</option>
                                            @foreach($wisata as $w)
                                                <option value="{{ $w['id'] }}">{{ $w['nama'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label fw-bold text-secondary">Tulis Komentar Anda:</label>
                                        <textarea name="content" id="content" rows="3" class="form-control" placeholder="Berikan ulasan atau pengalaman Anda..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane me-1"></i> Kirim Komentar</button>
                                </form>
                            @else
                                <div class="alert alert-warning text-center py-3 rounded-3">
                                    <p class="mb-2 fw-semibold">Anda harus login terlebih dahulu untuk menambahkan komentar.</p>
                                    <a href="{{ route('login') }}" class="btn btn-sm btn-primary px-3 fw-bold">Login Sekarang</a>
                                    <span class="mx-2 text-muted">atau</span>
                                    <a href="{{ route('register') }}" class="btn btn-sm btn-outline-primary px-3 fw-bold">Daftar Akun</a>
                                </div>
                            @endauth

                            <hr class="my-4">

                            <h6 class="fw-bold text-dark mb-3">Semua Komentar ({{ $comments->count() }})</h6>
                            
                            @if($comments->isEmpty())
                                <p class="text-muted text-center py-3">Belum ada komentar. Yuk, jadi yang pertama memberikan komentar!</p>
                            @else
                                <div class="comment-list" style="max-height: 400px; overflow-y: auto;">
                                    @foreach($comments as $comment)
                                        @php
                                            $namaWisata = 'Destinasi';
                                            foreach($wisata as $w) {
                                                if($w['id'] == $comment->wisata_id) {
                                                    $namaWisata = $w['nama'];
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <div class="p-3 mb-2 bg-white border rounded shadow-xs">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <strong class="text-primary">{{ $comment->user->name }}</strong>
                                                    <span class="badge bg-secondary ms-2" style="font-size: 0.7rem;">{{ $namaWisata }}</span>
                                                </div>
                                                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                            </div>
                                            <p class="mb-0 mt-2 text-dark" style="white-space: pre-line;">{{ $comment->content }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= END FITUR KOMENTAR ================= -->

    <!-- ================= FOOTER PERSIS SEPERTI GAMBAR (MAPS BISA DIGESER) ================= -->
    <footer class="pt-5 pb-4">
        <div class="container">
            
            <!-- BARIS PERTAMA: Tentang Karangasem (Kiri) + Google Maps (Kanan) -->
            <div class="row g-4 mb-4">
                <!-- Kolom Kiri: Tentang Karangasem -->
                <div class="col-lg-8">
                    <h5 class="fw-bold mb-3" style="font-size: 1.1rem;">Tentang Karangasem</h5>
                    <p style="text-align: justify; line-height: 1.7; font-size: 0.95rem;">
                        Kabupaten Karangasem adalah salah satu kabupaten di provinsi Bali, Indonesia yang menyimpan pesona alam dan budaya yang luar biasa.
                        <br><br>
                        Dengan luas wilayah 839,54 km², Karangasem memiliki berbagai destinasi wisata menarik seperti pura-pura berjejari, pantai eksotis, bukit dengan pemandangan menakjubkan, dan taman air yang indah.
                        <br><br>
                        Karangasem dikenal sebagai kawasan dengan kekayaan budaya yang masih terjaga, mulai dari upacara adat hingga peninggalan kerajaan. Destinasi wisata unggulannya menjadi daya tarik utama bagi wisatawan domestik maupun mancanegara.
                    </p>
                </div>

                <!-- Kolom Kanan: Google Maps (BISA DIGESER & DI-ZOOM) -->
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3" style="font-size: 1.1rem;">Lokasi Karangasem</h5>
                    <div class="footer-map">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126248.47195449914!2d115.4377885!3d-8.3752541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2ded459c0f994781%3A0x3030bfbcaf70170!2sKarangasem%20Regency%2C%20Bali!5e0!3m2!1sen!2sid!4v1690000000000!5m2!1sen!2sid" 
                            width="100%" 
                            height="200" 
                            style="border:2px solid rgba(255,255,255,0.1); border-radius:8px; pointer-events: auto !important;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

            <hr>

            <!-- BARIS KEDUA: 4 Kolom (Pesona Karangasem, Link Cepat, Kontak, Destinasi Populer) -->
            <div class="row g-4 pt-3">
                
                <!-- Kolom 1: Pesona Karangasem -->
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3" style="font-size: 1rem;">Pesona Karangasem</h5>
                    <p style="font-size: 0.9rem; line-height: 1.6;">
                        Menjelajahi keindahan alam dan budaya Karangasem, Bali Timur.
                    </p>
                    <div class="footer-social d-flex gap-2">
                        <a href="#" class="facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

                <!-- Kolom 2: Link Cepat -->
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3" style="font-size: 1rem;">Link Cepat</h5>
                    <ul class="list-unstyled footer-list" style="font-size: 0.9rem;">
                        <li><i class="fas fa-chevron-right"></i><a href="#" class="footer-link">Destinasi Wisata</a></li>
                        <li><i class="fas fa-chevron-right"></i><a href="#" class="footer-link">Tentang Karangasem</a></li>
                        <li><i class="fas fa-chevron-right"></i><a href="{{ route('login') }}" class="footer-link">Login</a></li>
                        <li><i class="fas fa-chevron-right"></i><a href="{{ route('register') }}" class="footer-link">Daftar</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Kontak -->
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3" style="font-size: 1rem;">Kontak</h5>
                    <ul class="list-unstyled" style="font-size: 0.9rem; line-height: 1.8;">
                        <li><i class="fas fa-map-marker-alt text-primary me-2"></i> Karangasem, Bali, Indonesia</li>
                        <li><i class="fas fa-envelope text-primary me-2"></i> info@pesonakarangasem.com</li>
                        <li><i class="fas fa-phone text-primary me-2"></i> +62 123 4567 890</li>
                    </ul>
                </div>

                <!-- Kolom 4: Destinasi Populer -->
                <div class="col-md-3">
                    <h5 class="fw-bold mb-3" style="font-size: 1rem;">Destinasi Populer</h5>
                    <ul class="list-unstyled footer-list" style="font-size: 0.9rem;">
                        <li><i class="fas fa-chevron-right"></i>Pura Besakih</li>
                        <li><i class="fas fa-chevron-right"></i>Tirta Gangga</li>
                        <li><i class="fas fa-chevron-right"></i>Pantai Amed</li>
                        <li><i class="fas fa-chevron-right"></i>Bukit Asah</li>
                        <li><i class="fas fa-chevron-right"></i>Lempuyang Temple</li>
                    </ul>
                </div>

            </div>

            <!-- Copyright -->
            <hr class="my-4">
            <div class="text-center small" style="font-size: 0.85rem;">
                &copy; 2024 Pesona Karangasem. All rights reserved.
            </div>

        </div>
    </footer>
    <!-- ================= END FOOTER ================= -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            var navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

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