<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class WisataController extends Controller
{
    public function index()
    {
        $wisata = [
            [
                'id' => 1,
                'nama' => 'Pura Besakih',
                'deskripsi' => 'Pura terbesar dan tersuci di Bali, terletak di lereng Gunung Agung. Dikenal sebagai "Mother Temple of Bali".',
                'lokasi' => 'Kecamatan Rendang, Karangasem',
                'kategori' => 'Pura',
                'harga' => 'Rp 25.000',
                'jam_buka' => '08:00 - 18:00',
                'gambar' => '/images/pura-besakih.jpg', // ✅ ADA
                'rating' => 4.9,
                'fasilitas' => ['Parkir Luas', 'Toilet', 'Warung Makan', 'Pemandu Wisata']
            ],
            [
                'id' => 2,
                'nama' => 'Tirta Gangga',
                'deskripsi' => 'Taman air bersejarah dengan kolam pemandian suci dan arsitektur yang indah.',
                'lokasi' => 'Kecamatan Abang, Karangasem',
                'kategori' => 'Taman Air',
                'harga' => 'Rp 20.000',
                'jam_buka' => '07:00 - 19:00',
                'gambar' => '/images/tirtagangga-gambar1.jpg', // ✅ PAKAI YANG ADA
                'rating' => 4.7,
                'fasilitas' => ['Kolam Renang', 'Toilet', 'Restoran', 'Spot Foto']
            ],
            [
                'id' => 3,
                'nama' => 'Pantai Amed',
                'deskripsi' => 'Pantai dengan pemandangan indah dan spot snorkeling terbaik.',
                'lokasi' => 'Kecamatan Abang, Karangasem',
                'kategori' => 'Pantai',
                'harga' => 'Rp 10.000',
                'jam_buka' => '24 Jam',
                'gambar' => '/images/amed-sunset-poi.jpg', // ✅ ADA
                'rating' => 4.6,
                'fasilitas' => ['Snorkeling', 'Diving', 'Penginapan', 'Warung Makan']
            ],
            [
                'id' => 4,
                'nama' => 'Bukit Asah',
                'deskripsi' => 'Bukit dengan pemandangan laut lepas dan sunrise yang cantik.',
                'lokasi' => 'Kecamatan Bebandem, Karangasem',
                'kategori' => 'Bukit',
                'harga' => 'Rp 15.000',
                'jam_buka' => '06:00 - 20:00',
                'gambar' => '/images/asah-hill.jpg', // ✅ ADA
                'rating' => 4.5,
                'fasilitas' => ['Area Camping', 'Toilet', 'Warung', 'Spot Sunrise']
            ],
            [
                'id' => 5,
                'nama' => 'Lempuyang Temple',
                'deskripsi' => 'Pura di ketinggian dengan gerbang surga yang ikonik.',
                'lokasi' => 'Kecamatan Abang, Karangasem',
                'kategori' => 'Pura',
                'harga' => 'Rp 30.000',
                'jam_buka' => '06:00 - 18:00',
                'gambar' => '/images/lempuyangan-te.jpg', // ✅ ADA
                'rating' => 4.8,
                'fasilitas' => ['Area Parkir', 'Toilet', 'Warung', 'Penyewaan Kain']
            ],
            [
                'id' => 6,
                'nama' => 'Istana Tampaksiring',
                'deskripsi' => 'Istana presiden dengan arsitektur perpaduan Bali dan modern.',
                'lokasi' => 'Kecamatan Tampaksiring, Karangasem',
                'kategori' => 'Sejarah',
                'harga' => 'Gratis',
                'jam_buka' => '08:00 - 16:00',
                'gambar' => '/images/istana-tampak.jpg', // ✅ ADA
                'rating' => 4.4,
                'fasilitas' => ['Taman', 'Museum', 'Pemandu', 'Area Parkir']
            ],
            [
                'id' => 7,
                'nama' => 'Air Terjun Tukad Cepung',
                'deskripsi' => 'Air terjun tersembunyi dengan dinding bebatuan yang megah. Sinar matahari menembus celah bebatuan menciptakan efek cahaya yang dramatis.',
                'lokasi' => 'Kecamatan Bangli, Karangasem',
                'kategori' => 'Air Terjun',
                'harga' => 'Rp 15.000',
                'jam_buka' => '08:00 - 17:00',
                'gambar' => '/images/tukad-cepung.jpg', // ⚠️ PERLU DICARI
                'rating' => 4.8,
                'fasilitas' => ['Parkir', 'Toilet', 'Warung Makan', 'Spot Foto']
            ],
            [
                'id' => 8,
                'nama' => 'Pantai Virgin Beach',
                'deskripsi' => 'Pantai pasir putih dengan air laut yang jernih dan tenang. Dikelilingi tebing hijau yang membuat suasana semakin eksotis.',
                'lokasi' => 'Kecamatan Karangasem, Karangasem',
                'kategori' => 'Pantai',
                'harga' => 'Rp 15.000',
                'jam_buka' => '08:00 - 18:00',
                'gambar' => '/images/virgin-beach.jpg', // ⚠️ PERLU DICARI
                'rating' => 4.8,
                'fasilitas' => ['Parkir', 'Toilet', 'Warung Makan', 'Sewa Kursi']
            ],
            [
                'id' => 9,
                'nama' => 'Desa Tenganan',
                'deskripsi' => 'Desa adat Bali Aga yang masih mempertahankan tradisi asli. Terkenal dengan tenunan geringsing.',
                'lokasi' => 'Kecamatan Manggis, Karangasem',
                'kategori' => 'Budaya',
                'harga' => 'Rp 15.000',
                'jam_buka' => '08:00 - 17:00',
                'gambar' => '/images/desa-tenganan.jpg', // ⚠️ PERLU DICARI
                'rating' => 4.8,
                'fasilitas' => ['Parkir', 'Toilet', 'Warung Makan', 'Sewa Kursi']
            ],
            [
                'id' => 10,
                'nama' => 'Taman Ujung Sukasada',
                'deskripsi' => 'Istana air peninggalan Kerajaan Karangasem dengan arsitektur Eropa dan Bali.',
                'lokasi' => 'Kecamatan Bebandem, Karangasem',
                'kategori' => 'Taman Air',
                'harga' => 'Rp 35.000',
                'jam_buka' => '08:00 - 19:00',
                'gambar' => '/images/taman-ujung.jpg', // ⚠️ PERLU DICARI
                'rating' => 4.6,
                'fasilitas' => ['Kolam', 'Area Foto', 'Toilet', 'Parkir']
            ],
        ];

        $comments = Comment::with('user')->latest()->get();

        return view('home', compact('wisata', 'comments'));
    }

    public function detail($id)
    {
        $wisata = [
            [
                'id' => 1,
                'nama' => 'Pura Besakih',
                'deskripsi' => 'Pura terbesar dan tersuci di Bali, terletak di lereng Gunung Agung. Dikenal sebagai "Mother Temple of Bali".',
                'lokasi' => 'Kecamatan Rendang, Karangasem',
                'kategori' => 'Pura',
                'harga' => 'Rp 25.000',
                'jam_buka' => '08:00 - 18:00',
                'gambar' => '/images/pura-besakih.jpg',
                'gambar2' => '/images/pura-besakih.jpg',
                'gambar3' => '/images/pura-besakih.jpg',
                'rating' => 4.9,
                'fasilitas' => ['Parkir Luas', 'Toilet', 'Warung Makan', 'Pemandu Wisata']
            ],
            [
                'id' => 2,
                'nama' => 'Tirta Gangga',
                'deskripsi' => 'Taman air bersejarah dengan kolam pemandian suci dan arsitektur yang indah.',
                'lokasi' => 'Kecamatan Abang, Karangasem',
                'kategori' => 'Taman Air',
                'harga' => 'Rp 20.000',
                'jam_buka' => '07:00 - 19:00',
                'gambar' => '/images/tirtagangga-gambar1.jpg',
                'gambar2' => '/images/tirtagangga-gambar3.jpg',
                'gambar3' => '/images/tirtagangga-gambar4.jpg',
                'rating' => 4.7,
                'fasilitas' => ['Kolam Renang', 'Toilet', 'Restoran', 'Spot Foto']
            ],
            [
                'id' => 3,
                'nama' => 'Pantai Amed',
                'deskripsi' => 'Pantai dengan pemandangan indah dan spot snorkeling terbaik.',
                'lokasi' => 'Kecamatan Abang, Karangasem',
                'kategori' => 'Pantai',
                'harga' => 'Rp 10.000',
                'jam_buka' => '24 Jam',
                'gambar' => '/images/amed-sunset-poi.jpg',
                'gambar2' => '/images/amed-sunset-poi.jpg',
                'gambar3' => '/images/amed-sunset-poi.jpg',
                'rating' => 4.6,
                'fasilitas' => ['Snorkeling', 'Diving', 'Penginapan', 'Warung Makan']
            ],
            [
                'id' => 4,
                'nama' => 'Bukit Asah',
                'deskripsi' => 'Bukit dengan pemandangan laut lepas dan sunrise yang cantik.',
                'lokasi' => 'Kecamatan Bebandem, Karangasem',
                'kategori' => 'Bukit',
                'harga' => 'Rp 15.000',
                'jam_buka' => '06:00 - 20:00',
                'gambar' => '/images/asah-hill.jpg',
                'gambar2' => '/images/asah-hill.jpg',
                'gambar3' => '/images/asah-hill.jpg',
                'rating' => 4.5,
                'fasilitas' => ['Area Camping', 'Toilet', 'Warung', 'Spot Sunrise']
            ],
            [
                'id' => 5,
                'nama' => 'Lempuyang Temple',
                'deskripsi' => 'Pura di ketinggian dengan gerbang surga yang ikonik.',
                'lokasi' => 'Kecamatan Abang, Karangasem',
                'kategori' => 'Pura',
                'harga' => 'Rp 30.000',
                'jam_buka' => '06:00 - 18:00',
                'gambar' => '/images/lempuyangan-te.jpg',
                'gambar2' => '/images/lempuyangan-te.jpg',
                'gambar3' => '/images/lempuyangan-te.jpg',
                'rating' => 4.8,
                'fasilitas' => ['Area Parkir', 'Toilet', 'Warung', 'Penyewaan Kain']
            ],
            [
                'id' => 6,
                'nama' => 'Istana Tampaksiring',
                'deskripsi' => 'Istana presiden dengan arsitektur perpaduan Bali dan modern.',
                'lokasi' => 'Kecamatan Tampaksiring, Karangasem',
                'kategori' => 'Sejarah',
                'harga' => 'Gratis',
                'jam_buka' => '08:00 - 16:00',
                'gambar' => '/images/istana-tampak.jpg',
                'gambar2' => '/images/istana-tampak.jpg',
                'gambar3' => '/images/istana-tampak.jpg',
                'rating' => 4.4,
                'fasilitas' => ['Taman', 'Museum', 'Pemandu', 'Area Parkir']
            ],
            [
                'id' => 7,
                'nama' => 'Air Terjun Tukad Cepung',
                'deskripsi' => 'Air terjun tersembunyi dengan dinding bebatuan yang megah.',
                'lokasi' => 'Kecamatan Bangli, Karangasem',
                'kategori' => 'Air Terjun',
                'harga' => 'Rp 15.000',
                'jam_buka' => '08:00 - 17:00',
                'gambar' => '/images/tukad-cepung.jpg',
                'gambar2' => '/images/tukad-cepung.jpg',
                'gambar3' => '/images/tukad-cepung.jpg',
                'rating' => 4.8,
                'fasilitas' => ['Parkir', 'Toilet', 'Warung Makan', 'Spot Foto']
            ],
            [
                'id' => 8,
                'nama' => 'Pantai Virgin Beach',
                'deskripsi' => 'Pantai pasir putih dengan air laut yang jernih dan tenang.',
                'lokasi' => 'Kecamatan Karangasem, Karangasem',
                'kategori' => 'Pantai',
                'harga' => 'Rp 15.000',
                'jam_buka' => '08:00 - 18:00',
                'gambar' => '/images/virgin-beach.jpg',
                'gambar2' => '/images/virgin-beach.jpg',
                'gambar3' => '/images/virgin-beach.jpg',
                'rating' => 4.8,
                'fasilitas' => ['Parkir', 'Toilet', 'Warung Makan', 'Sewa Kursi']
            ],
            [
                'id' => 9,
                'nama' => 'Desa Tenganan',
                'deskripsi' => 'Desa adat Bali Aga yang masih mempertahankan tradisi asli.',
                'lokasi' => 'Kecamatan Manggis, Karangasem',
                'kategori' => 'Budaya',
                'harga' => 'Gratis',
                'jam_buka' => '08:00 - 17:00',
                'gambar' => '/images/desa-tenganan.jpg',
                'gambar2' => '/images/desa-tenganan.jpg',
                'gambar3' => '/images/desa-tenganan.jpg',
                'rating' => 4.7,
                'fasilitas' => ['Area Parkir', 'Toilet', 'Warung', 'Pemandu']
            ],
            [
                'id' => 10,
                'nama' => 'Taman Ujung Sukasada',
                'deskripsi' => 'Istana air peninggalan Kerajaan Karangasem dengan arsitektur Eropa dan Bali.',
                'lokasi' => 'Kecamatan Bebandem, Karangasem',
                'kategori' => 'Taman Air',
                'harga' => 'Rp 35.000',
                'jam_buka' => '08:00 - 19:00',
                'gambar' => '/images/taman-ujung.jpg',
                'gambar2' => '/images/taman-ujung.jpg',
                'gambar3' => '/images/taman-ujung.jpg',
                'rating' => 4.6,
                'fasilitas' => ['Kolam', 'Area Foto', 'Toilet', 'Parkir']
            ]
        ];

        $item = null;
        foreach ($wisata as $w) {
            if ($w['id'] == $id) {
                $item = $w;
                break;
            }
        }

        if (!$item) {
            abort(404);
        }

        return view('detail', ['wisata' => $item]);
    }
}