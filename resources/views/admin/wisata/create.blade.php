<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Wisata - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar {
            min-height: 100vh;
            background-color: #212529;
            color: white;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.75);
            margin-bottom: 5px;
            border-radius: 5px;
            transition: all 0.2s;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background-color: #0d6efd;
        }
        .sidebar .nav-link.text-danger:hover {
            background-color: #dc3545;
        }
        .form-label {
            font-weight: 600;
        }
        .required {
            color: red;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        
        <!-- SIDEBAR -->
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3">
            <div class="d-flex align-items-center mb-4 px-2">
                <i class="fas fa-umbrella-beach fa-2x text-primary me-2"></i>
                <span class="fs-5 fw-bold text-white">Admin Panel</span>
            </div>
            <hr class="text-secondary">
            
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.wisata.index') }}">
                        <i class="fas fa-map-marked-alt me-2"></i> Kelola Wisata
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="fas fa-home me-2"></i> Lihat Website
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <hr class="text-secondary">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link text-danger border-0 bg-transparent w-100 text-start">
                            <i class="fas fa-sign-out-alt me-2"></i> Keluar Panel
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- KONTEN -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            
            <!-- Header -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Tambah Wisata</h1>
                <a href="{{ route('admin.wisata.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <!-- Form -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.wisata.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <!-- Nama Wisata -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Wisata <span class="required">*</span></label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Masukkan nama wisata" required>
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Kategori -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kategori <span class="required">*</span></label>
                                <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror" value="{{ old('kategori') }}" placeholder="Contoh: Pura, Pantai, Taman Air" required>
                                @error('kategori')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Lokasi -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Lokasi <span class="required">*</span></label>
                                <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi') }}" placeholder="Kecamatan, Kabupaten" required>
                                @error('lokasi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Harga -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Harga <span class="required">*</span></label>
                                <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" placeholder="Rp 50.000" required>
                                @error('harga')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Jam Buka -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jam Buka <span class="required">*</span></label>
                                <input type="text" name="jam_buka" class="form-control @error('jam_buka') is-invalid @enderror" value="{{ old('jam_buka') }}" placeholder="06:00 - 19:00" required>
                                @error('jam_buka')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Rating -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Rating (0-5)</label>
                                <input type="number" name="rating" class="form-control @error('rating') is-invalid @enderror" value="{{ old('rating') }}" step="0.1" min="0" max="5" placeholder="4.5">
                                @error('rating')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Gambar -->
                            <div class="col-12 mb-3">
                                <label class="form-label">URL Gambar <span class="required">*</span></label>
                                <input type="text" name="gambar" class="form-control @error('gambar') is-invalid @enderror" value="{{ old('gambar') }}" placeholder="/images/nama_file.jpg" required>
                                <small class="text-muted">Masukkan path gambar di folder public/images/</small>
                                @error('gambar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Fasilitas -->
                            <div class="col-12 mb-3">
                                <label class="form-label">Fasilitas</label>
                                <input type="text" name="fasilitas" class="form-control" value="{{ old('fasilitas') }}" placeholder="Parkir, Toilet, Warung Makan (pisahkan dengan koma)">
                                <small class="text-muted">Pisahkan setiap fasilitas dengan koma</small>
                            </div>

                            <!-- Deskripsi -->
                            <div class="col-12 mb-3">
                                <label class="form-label">Deskripsi <span class="required">*</span></label>
                                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5" placeholder="Masukkan deskripsi wisata" required>{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Tombol -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Simpan
                                </button>
                                <a href="{{ route('admin.wisata.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-1"></i> Batal
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>