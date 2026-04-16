<!-- Hero Section dengan Gambar -->
<section class="hero">
    <div class="hero-content">
        <h1>Selamat Datang di Karangasem</h1>
        <p>Jelajahi keindahan alam dan budaya Bali bagian timur</p>
        <a href="#destinasi" class="btn-custom">
            <i class="fas fa-arrow-down"></i> Lihat Destinasi
        </a>
    </div>
</section>

<style>
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
</style>