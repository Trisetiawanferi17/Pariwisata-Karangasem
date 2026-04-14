<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="fas fa-umbrella-beach me-2"></i>
            Pesona Karangasem
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#destinasi">Destinasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tentang">Tentang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Navbar - AWALNYA TRANSPARAN */
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        background-color: transparent !important;
        padding: 20px 0;
        transition: all 0.4s ease-in-out;
    }
    
    /* Navbar saat di-scroll - MENJADI SOLID PUTIH */
    .navbar.scrolled {
        background-color: #ffffff !important;
        padding: 10px 0;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }
    
    /* Warna teks navbar saat transparan (awal) */
    .navbar .navbar-brand,
    .navbar .nav-link {
        color: white !important;
        transition: all 0.3s ease;
    }
    
    /* Warna teks navbar saat solid (setelah scroll) */
    .navbar.scrolled .navbar-brand,
    .navbar.scrolled .nav-link {
        color: #0d6efd !important;
    }
    
    /* Hover effect untuk link */
    .navbar .nav-link:hover {
        opacity: 0.8;
        transform: translateY(-2px);
    }
    
    .navbar.scrolled .nav-link:hover {
        color: #0a58ca !important;
        opacity: 1;
    }
    
    .navbar-brand {
        font-size: 1.5rem;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    
    .nav-link {
        font-size: 1rem;
        margin: 0 10px;
        transition: all 0.3s ease;
    }
    
    /* Tambahan efek shadow saat discroll */
    .navbar.scrolled {
        backdrop-filter: blur(0px);
    }
    
    /* Tombol toggler (untuk mobile) */
    .navbar-toggler {
        border-color: rgba(255,255,255,0.5);
        transition: all 0.3s ease;
    }
    
    .navbar.scrolled .navbar-toggler {
        border-color: #0d6efd;
    }
    
    .navbar-toggler-icon {
        filter: brightness(0) invert(1);
        transition: all 0.3s ease;
    }
    
    .navbar.scrolled .navbar-toggler-icon {
        filter: none;
    }
</style>

<script>
    // Navbar berubah dari transparan menjadi SOLID saat discroll
    window.addEventListener('scroll', function() {
        var navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>