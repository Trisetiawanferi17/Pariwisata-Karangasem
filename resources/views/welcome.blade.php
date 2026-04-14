<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesona Karangasem - Bali</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Hero Section dengan Gambar Background */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/karangasem-background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }
        
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        
        .hero-section p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }
        
        .hero-section .btn {
            padding: 12px 30px;
            font-size: 1.2rem;
            border-radius: 50px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.3);
        }
        
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        
        .rating {
            color: #ffc107;
        }
    </style>
</head>
<body>

<x-navbar></x-navbar>

<!-- Hero Section dengan Background Gambar -->
<section class="hero-section" style="margin-top: 56px;">
    <div class="container">
        <h1>Selamat Datang di Karangasem</h1>
        <p>Jelajahi keindahan alam dan budaya Bali bagian timur</p>
        <a href="#destinasi" class="btn btn-light btn-lg">
            <i class="fas fa-arrow-down me-2"></i>Lihat Destinasi
        </a>
    </div>
</section>

<!-- Destinasi Section -->
<section id="destinasi" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Destinasi Wisata Populer</h2>
        
        <div class="row g-4">
            <!-- Data Wisata Statis sementara -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/400x300?text=Drum+Beach" class="card-img-top" alt="Drum Beach">
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">Pantai</span>
                        <h5 class="card-title">Drum Beach</h5>
                        <p class="card-text text-muted">
                            <i class="fas fa-map-marker-alt"></i> Karangasem, Bali
                        </p>
                        <div class="rating mb-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span class="text-muted ms-2">(4.0)</span>
                        </div>
                        <p class="card-text">Pantai eksotis dengan tebing tinggi dan ombak yang menantang.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h6 mb-0">Rp 10.000</span>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="fas fa-eye me-1"></i>Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/400x300?text=Tinta+Cempaka" class="card-img-top" alt="Tinta Cempaka">
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">Budaya</span>
                        <h5 class="card-title">Tinta Cempaka</h5>
                        <p class="card-text text-muted">
                            <i class="fas fa-map-marker-alt"></i> Karangasem, Bali
                        </p>
                        <div class="rating mb-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span class="text-muted ms-2">(5.0)</span>
                        </div>
                        <p class="card-text">Wisata budaya dengan pemandangan alam yang memukau.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h6 mb-0">Rp 15.000</span>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="fas fa-eye me-1"></i>Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://via.placeholder.com/400x300?text=Pantai+Ampel" class="card-img-top" alt="Pantai Ampel">
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">Pantai</span>
                        <h5 class="card-title">Pantai Ampel</h5>
                        <p class="card-text text-muted">
                            <i class="fas fa-map-marker-alt"></i> Karangasem, Bali
                        </p>
                        <div class="rating mb-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="text-muted ms-2">(4.5)</span>
                        </div>
                        <p class="card-text">Pantai dengan pasir putih dan air jernih yang menenangkan.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h6 mb-0">Rp 8.000</span>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="fas fa-eye me-1"></i>Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tentang Section -->
<section id="tentang" class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Tentang Karangasem</h2>
                <p class="lead">Kabupaten Karangasem adalah salah satu kabupaten di provinsi Bali, Indonesia yang menyimpan pesona alam dan budaya yang luar biasa.</p>
                <p>Dengan luas wilayah 839,54 km², Karangasem memiliki berbagai destinasi wisata menarik seperti pura-pura bersejarah, pantai eksotis, bukit dengan pemandangan menakjubkan, dan taman air yang indah.</p>
                <div class="row mt-4">
                    <div class="col-4 text-center">
                        <i class="fas fa-temple fa-3x text-primary"></i>
                        <h5>20+ Pura</h5>
                    </div>
                    <div class="col-4 text-center">
                        <i class="fas fa-umbrella-beach fa-3x text-primary"></i>
                        <h5>15+ Pantai</h5>
                    </div>
                    <div class="col-4 text-center">
                        <i class="fas fa-mountain fa-3x text-primary"></i>
                        <h5>10+ Bukit</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="/images/karangasem-background.jpg" class="img-fluid rounded shadow" alt="Karangasem" style="width: 100%; height: auto; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5><i class="fas fa-umbrella-beach me-2"></i>Pesona Karangasem</h5>
                <p>Website informasi wisata Kabupaten Karangasem, Bali.</p>
            </div>
            <div class="col-md-4">
                <h5>Kontak</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-phone me-2"></i> +62 361 123456</li>
                    <li><i class="fas fa-envelope me-2"></i> info@pesonakarangasem.com</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Ikuti Kami</h5>
                <div>
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-2x"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-2x"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-youtube fa-2x"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-center">
            <small>&copy; 2024 Pesona Karangasem. All rights reserved.</small>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>