<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $wisata['nama'] }} - Pesona Karangasem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .rating {
            color: #ffc107;
        }
        .gallery-img {
            height: 150px;
            object-fit: cover;
            cursor: pointer;
            transition: transform 0.3s;
        }
        .gallery-img:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<x-navbar></x-navbar>

<!-- Detail Section -->
<section class="py-5">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/#destinasi" class="text-decoration-none">Destinasi</a></li>
                <li class="breadcrumb-item active">{{ $wisata['nama'] }}</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Gambar Utama -->
            <div class="col-md-8">
                <img src="{{ $wisata['gambar'] }}" class="img-fluid rounded shadow" alt="{{ $wisata['nama'] }}">
                
                <!-- Galeri -->
                @if(isset($wisata['gambar2']))
                <div class="row mt-3">
                    <div class="col-4">
                        <img src="{{ $wisata['gambar'] }}" class="img-fluid rounded gallery-img" alt="Gallery 1">
                    </div>
                    <div class="col-4">
                        <img src="{{ $wisata['gambar2'] }}" class="img-fluid rounded gallery-img" alt="Gallery 2">
                    </div>
                    <div class="col-4">
                        <img src="{{ $wisata['gambar3'] ?? $wisata['gambar'] }}" class="img-fluid rounded gallery-img" alt="Gallery 3">
                    </div>
                </div>
                @endif
            </div>

            <!-- Info -->
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="h3">{{ $wisata['nama'] }}</h2>
                        <span class="badge bg-primary mb-3">{{ $wisata['kategori'] }}</span>
                        
                        <!-- Rating -->
                        <div class="rating mb-3">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $wisata['rating'])
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                            <span class="text-muted ms-2">{{ $wisata['rating'] }} / 5</span>
                        </div>

                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                <strong>Lokasi:</strong><br>
                                {{ $wisata['lokasi'] }}
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-clock text-primary me-2"></i>
                                <strong>Jam Buka:</strong><br>
                                {{ $wisata['jam_buka'] }}
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-ticket-alt text-primary me-2"></i>
                                <strong>Harga Tiket:</strong><br>
                                {{ $wisata['harga'] }}
                            </li>
                        </ul>

                        <!-- Fasilitas -->
                        @if(isset($wisata['fasilitas']))
                        <h5 class="mt-4">Fasilitas:</h5>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($wisata['fasilitas'] as $fasilitas)
                            <span class="badge bg-light text-dark p-2">
                                <i class="fas fa-check-circle text-success me-1"></i>
                                {{ $fasilitas }}
                            </span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Deskripsi -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Deskripsi</h4>
                    </div>
                    <div class="card-body">
                        <p>{{ $wisata['deskripsi'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="row mt-4">
            <div class="col-12">
                <a href="/#destinasi" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar Wisata
                </a>
            </div>
        </div>
    </div>
</section>

<x-footer></x-footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>