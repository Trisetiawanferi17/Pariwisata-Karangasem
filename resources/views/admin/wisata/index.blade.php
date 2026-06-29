<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Wisata - Admin</title>
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
        .wisata-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }
        .table td {
            vertical-align: middle;
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
                <h1 class="h2">Kelola Wisata</h1>
                <a href="{{ route('admin.wisata.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Tambah Wisata
                </a>
            </div>

            <!-- Alert -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Tabel Wisata -->
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Lokasi</th>
                                    <th>Harga</th>
                                    <th>Rating</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($wisata as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ $item->gambar }}" alt="{{ $item->nama }}" class="wisata-img">
                                    </td>
                                    <td><strong>{{ $item->nama }}</strong></td>
                                    <td><span class="badge bg-primary">{{ $item->kategori }}</span></td>
                                    <td>{{ $item->lokasi }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>
                                        <span class="badge bg-warning text-dark">
                                            <i class="fas fa-star me-1"></i> {{ $item->rating }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.wisata.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.wisata.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus wisata ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        <i class="fas fa-map-marked-alt fa-2x mb-2 d-block opacity-50"></i>
                                        Belum ada data wisata. 
                                        <a href="{{ route('admin.wisata.create') }}">Tambah sekarang</a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Total Data -->
            <div class="mt-3 text-muted">
                <small>Total: {{ $wisata->count() }} wisata</small>
            </div>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>