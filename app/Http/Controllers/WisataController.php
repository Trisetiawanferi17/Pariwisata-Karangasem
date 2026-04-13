<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function index()
    {
        // Data dummy wisata Karangasem dengan gambar Picsum
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
                'gambar' => '/images/tirta-gangga-bali-gambar1', // Foto air/kolam
                'rating' => 4.7
            ],
            [
                'id' => 3,
                'nama' => 'Pantai Amed',
                'deskripsi' => 'Pantai dengan pemandangan indah dan spot snorkeling terbaik.',
                'lokasi' => 'Kecamatan Abang, Karangasem',
                'kategori' => 'Pantai',
                'harga' => 'Rp 10.000',
                'jam_buka' => '24 Jam',
                'gambar' => '/images/pantai-amed.jpg', // Foto pantai
                'rating' => 4.6
            ],
            [
                'id' => 4,
                'nama' => 'Bukit Asah',
                'deskripsi' => 'Bukit dengan pemandangan laut lepas dan sunrise yang cantik.',
                'lokasi' => 'Kecamatan Bebandem, Karangasem',
                'kategori' => 'Bukit',
                'harga' => 'Rp 15.000',
                'jam_buka' => '06:00 - 20:00',
                'gambar' => '/images/bukit-asah-sunset-Ai.png', // Foto bukit/gunung
                'rating' => 4.5
            ],
            [
                'id' => 5,
                'nama' => 'Lempuyang Temple',
                'deskripsi' => 'Pura di ketinggian dengan gerbang surga yang ikonik.',
                'lokasi' => 'Kecamatan Abang, Karangasem',
                'kategori' => 'Pura',
                'harga' => 'Rp 30.000',
                'jam_buka' => '06:00 - 18:00',
                'gambar' => '/images/lempuyangan-temple.jpg', // Foto pura/kuil
                'rating' => 4.8
            ],
            [
                'id' => 6,
                'nama' => 'Istana Tampaksiring',
                'deskripsi' => 'Istana presiden dengan arsitektur perpaduan Bali dan modern.',
                'lokasi' => 'Kecamatan Tampaksiring, Karangasem',
                'kategori' => 'Sejarah',
                'harga' => 'Gratis',
                'jam_buka' => '08:00 - 16:00',
                'gambar' => '/images/istana-tampak siring.jpg', // Foto bangunan
                'rating' => 4.4
            ]
        ];

        return view('home', compact('wisata'));
    }

    public function detail($id)
    {
        // Data dummy lengkap dengan fasilitas
$wisata = [
    [
        'id' => 1,
        'nama' => 'Pura Besakih',
        'deskripsi' => 'Pura terbesar dan tersuci di Bali, terletak di lereng Gunung Agung. Dikenal sebagai "Mother Temple of Bali". Kompleks pura ini terdiri dari 22 pura yang tersebar di area seluas 3 hektar. Pura utama yang paling disucikan adalah Pura Penataran Agung.',
        'lokasi' => 'Kecamatan Rendang, Karangasem',
        'kategori' => 'Pura',
        'harga' => 'Rp 25.000',
        'jam_buka' => '08:00 - 18:00',
        'gambar' => '/images/Pura-besakih-gambar1.jpg',
        'gambar2' => '/images/pura-besakih-gambar4.jpg',
        'gambar3' => '/images/pura-besakih-gambar3.jpg',
        'rating' => 4.9,
        'fasilitas' => ['Parkir Luas', 'Toilet', 'Warung Makan', 'Pemandu Wisata']
            ],
            [
                'id' => 2,
                'nama' => 'Tirta Gangga',
                'deskripsi' => 'Taman air bersejarah dengan kolam pemandian suci dan arsitektur yang indah.Tirta Gangga dibangun pada tahun 1946 oleh Raja Karangasem, Anak Agung Anglurah Ketut Karangasem. Nama "Tirta Gangga" berarti "air dari Sungai Gangga" yang dipercaya memiliki khasiat penyucian. Tempat ini memadukan arsitektur Bali dan China dengan patung-patung dewa yang menghiasi taman. Terdapat kolam renang alami yang bisa digunakan pengunjung untuk berendam di air yang dianggap suci. Kolam ikan dengan ribuan ikan koi yang besar-besar menjadi daya tarik tersendiri. Taman ini sangat cocok untuk bersantai sambil menikmati pemandangan Gunung Agung yang megah.',
                'lokasi' => 'Kecamatan Abang, Karangasem',
                'kategori' => 'Taman Air',
                'harga' => 'Rp 20.000',
                'jam_buka' => '07:00 - 19:00',
                'gambar' => '/images/tirtagangga-jembatan.jpg',
                'gambar2' => '/images/tirtagangga-gambar3.jpg',
                'gambar3' => '/images/tirtagangga-gambar4.jpg',
                'rating' => 4.7,
                'fasilitas' => ['Kolam Renang', 'Toilet', 'Restoran', 'Spot Foto']
            ],
            [
                'id' => 3,
                'nama' => 'Pantai Amed',
                'deskripsi' => 'Pantai dengan pemandangan indah dan spot snorkeling terbaik, Memiliki hamparan pasir hitam dan pemandangan Gunung Agung di kejauhan. Surga bagi penyelam dengan keindahan terumbu karang dan kapal karam.',
                'lokasi' => 'Kecamatan Abang, Karangasem',
                'kategori' => 'Pantai',
                'harga' => 'Rp 10.000',
                'jam_buka' => '24 Jam',
                'gambar' => '/images/pantai-amed-Snorkeling.jpg',
                'gambar2' => '/images/amed-sunset-point.jpg',
                'gambar3' => '/images/pantai-amed.jpg',
                'rating' => 4.6,
                'fasilitas' => ['Snorkeling', 'Diving', 'Penginapan', 'Warung Makan']
            ],
            [
                'id' => 4,
                'nama' => 'Bukit Asah',
                'deskripsi' => 'Bukit dengan pemandangan laut lepas dan sunrise yang cantik.Tempat camping favorit dengan view laut dan bukit yang hijau. Cocok untuk menikmati matahari terbit dan berkemah bersama keluarga.',
                'lokasi' => 'Kecamatan Bebandem, Karangasem',
                'kategori' => 'Bukit',
                'harga' => 'Rp 15.000',
                'jam_buka' => '06:00 - 20:00',
                'gambar' => '/images/bukit-asah-sunset-Ai.png',
                'gambar2' => '/images/asah-hill.jpg',
                'gambar3' => '/images/bukit-asah-camping-area-Ai.png',
                'rating' => 4.5,
                'fasilitas' => ['Area Camping', 'Toilet', 'Warung', 'Spot Sunrise']
            ],
            [
                'id' => 5,
                'nama' => 'Lempuyang Temple',
                'deskripsi' => 'Pura di ketinggian dengan gerbang surga yang ikonik.Terkenal dengan "Gates of Heaven" yang menjadi spot foto populer. Untuk mencapai puncak, pengunjung harus mendaki sekitar 1700 anak tangga.',
                'lokasi' => 'Kecamatan Abang, Karangasem',
                'kategori' => 'Pura',
                'harga' => 'Rp 30.000',
                'jam_buka' => '06:00 - 18:00',
                'gambar' => '/images/logo-lempuyang-gambar1.jpg',
                'gambar2' => '/images/lempuyang-temple-gate.jpg',
                'gambar3' => '/images/Lempuyang-Temple-spotfoto.jpg',
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
                'gambar' => '/images/istana-tampak siring.jpg',
                'gambar2' => '/images/istana-tampak siring.jpg',
                'gambar3' => '/images/istana-tampak siring.jpg',
                'rating' => 4.4,
                'fasilitas' => ['Taman', 'Museum', 'Pemandu', 'Area Parkir']
            ]
        ];

        // Cari wisata berdasarkan id
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