<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Pesona Karangasem</title>
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
        .card-counter {
            border-left: 5px solid;
            transition: transform 0.2s;
            border-top: none;
            border-right: none;
            border-bottom: none;
        }
        .card-counter:hover { transform: translateY(-3px); }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3">
            <div class="d-flex align-items-center mb-4 px-2">
                <i class="fas fa-umbrella-beach fa-2x text-primary me-2"></i>
                <span class="fs-5 fw-bold text-white">Admin Panel</span>
            </div>
            <hr class="text-secondary">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
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

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard Ringkasan</h1>
                <span class="badge bg-primary p-2">
                    <i class="fas fa-calendar-alt me-1"></i> {{ date('d M Y') }}
                </span>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row g-3 mb-4">
                <div class="col-12 col-sm-6 col-xl-4">
                    <div class="card card-counter shadow-sm bg-white border-primary h-100 p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="text-muted text-uppercase small mb-1">Total Destinasi</h6>
                                <h3 class="fw-bold mb-0 text-primary">{{ $total_destinasi ?? 0 }}</h3>
                            </div>
                            <i class="fas fa-map-marked-alt fa-2x text-primary opacity-25"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-4">
                    <div class="card card-counter shadow-sm bg-white border-success h-100 p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="text-muted text-uppercase small mb-1">Total Komentar</h6>
                                <h3 class="fw-bold mb-0 text-success">{{ $total_komentar ?? 0 }}</h3>
                            </div>
                            <i class="fas fa-comment-dots fa-2x text-success opacity-25"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-4">
                    <div class="card card-counter shadow-sm bg-white border-warning h-100 p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="text-muted text-uppercase small mb-1">Total Pengguna</h6>
                                <h3 class="fw-bold mb-0 text-warning">{{ $total_pengguna ?? 0 }}</h3>
                            </div>
                            <i class="fas fa-users fa-2x text-warning opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 fw-bold text-secondary">
                                <i class="fas fa-history me-2 text-primary"></i> Komentar Pengunjung Terbaru
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Pengguna</th>
                                            <th>Destinasi</th>
                                            <th>Komentar</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($komentar_terbaru ?? [] as $komentar)
                                        <tr>
                                            <td>
                                                <strong>{{ $komentar->user->name ?? 'Anonim' }}</strong>
                                                <br><small class="text-muted">{{ $komentar->user->email ?? '' }}</small>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary">
                                                    {{ $komentar->wisata->nama ?? 'Wisata Terhapus' }}
                                                </span>
                                            </td>
                                            <td>{{ \Illuminate\Support\Str::limit($komentar->content ?? '', 80) }}</td>
                                            <td>
                                                <small class="text-muted">
                                                    {{ $komentar->created_at ? $komentar->created_at->diffForHumans() : '-' }}
                                                </small>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted py-4">
                                                <i class="fas fa-comment-slash fa-2x mb-2 d-block opacity-50"></i>
                                                Belum ada komentar dari pengunjung.
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>