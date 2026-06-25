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
                'deskripsi' => 'Pura terbesar dan tersuci di Bali, terletak di lereng Gunung Agung. Dikenal sebagai "Mother Temple of Bali" Kompleks pura ini terdiri dari 22 pura yang tersebar di area seluas 3 hektar. Pura utama yang paling disucikan adalah Pura Penataran Agung..',
                'lokasi' => 'Kecamatan Rendang, Karangasem',
                'kategori' => 'Pura',
                'harga' => 'Rp 25.000',
                'jam_buka' => '08:00 - 18:00',
                'gambar' => '/images/Pura-besakih-gambar1.jpg',
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
                'gambar' => '/images/tirta-gangga-pinterest.jpg',
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
                'gambar' => '/images/amed-sunset-point.jpg',
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
                'gambar' => '/images/lempuyangan-temple.jpg',
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
                'gambar' => '/images/istana-tampaksiring-new.jpg',
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
                'gambar' => '/images/tukad_cepung_bali17.jpg',
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
                'gambar' => '/images/virgin-beach-karangasem.jpg',
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
                'gambar' => '/images/Desa-Adat-Tenganan-selamatdatang.jpg',
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
                'gambar' => '/images/tamanujung-bali.jpg',
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
                'deskripsi' => 'Pura terbesar dan tersuci di Bali, terletak di lereng Gunung Agung. Dikenal sebagai "Mother Temple of Bali" Kompleks pura ini terdiri dari 22 pura yang tersebar di area seluas 3 hektar. Pura utama yang paling disucikan adalah Pura Penataran Agung.',
                'lokasi' => 'Kecamatan Rendang, Karangasem',
                'kategori' => 'Pura',
                'harga' => 'Rp 25.000',
                'jam_buka' => '08:00 - 18:00',
                'gambar' => '/images/pura-besakih.jpg',
                'gambar2' => '/images/pura-besakih-gambar2.jpg',
                'gambar3' => '/images/pura-besakih-gambar3.jpg',
                'rating' => 4.9,
                'fasilitas' => ['Parkir Luas', 'Toilet', 'Warung Makan', 'Pemandu Wisata']
            ],
            [
                'id' => 2,
                'nama' => 'Tirta Gangga',
                'deskripsi' => 'Taman air bersejarah dengan kolam pemandian suci dan arsitektur yang indah. Tirta Gangga dibangun pada tahun 1946 oleh Raja Karangasem, Anak Agung Anglurah Ketut Karangasem. Nama "Tirta Gangga" berarti "air dari Sungai Gangga" yang dipercaya memiliki khasiat penyucian.',
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
                'deskripsi' => 'Pantai dengan pemandangan indah dan spot snorkeling terbaik.',
                'lokasi' => 'Kecamatan Abang, Karangasem',
                'kategori' => 'Pantai',
                'harga' => 'Rp 10.000',
                'jam_buka' => '24 Jam',
                'gambar' => '/images/pantai-amed-Snorkeling.jpg',
                'gambar2' => '/images/pantai-amed.jpg',
                'gambar3' => '/images/BlooLagoonBeach1.jpg',
                'rating' => 4.6,
                'fasilitas' => ['Snorkeling', 'Diving', 'Penginapan', 'Warung Makan']
            ],
            [
                'id' => 4,
                'nama' => 'Bukit Asah',
                'deskripsi' => 'Bukit dengan pemandangan laut lepas dan sunrise yang cantik. Tempat camping favorit dengan view laut dan bukit yang hijau. Cocok untuk menikmati matahari terbit dan berkemah bersama keluarga.',
                'lokasi' => 'Kecamatan Bebandem, Karangasem',
                'kategori' => 'Bukit',
                'harga' => 'Rp 15.000',
                'jam_buka' => '06:00 - 20:00',
                'gambar' => '/images/treebukitasah.jpg',
                'gambar2' => '/images/bukitasahcampingarea.jpg',
                'gambar3' => '/images/asah-hill.jpg',
                'rating' => 4.5,
                'fasilitas' => ['Area Camping', 'Toilet', 'Warung', 'Spot Sunrise']
            ],
            [
                'id' => 5,
                'nama' => 'Lempuyang Temple',
                'deskripsi' => 'Pura di ketinggian dengan gerbang surga yang ikonik. Terkenal dengan "Gates of Heaven" yang menjadi spot foto populer. Untuk mencapai puncak, pengunjung harus mendaki sekitar 1700 anak tangga.',
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
                'deskripsi' => 'Istana presiden dengan arsitektur perpaduan Bali dan modern. Dibangun pada masa pemerintahan Presiden Soekarno dan digunakan sebagai tempat peristirahatan presiden.',
                'lokasi' => 'Kecamatan Tampaksiring, Karangasem',
                'kategori' => 'Sejarah',
                'harga' => 'Gratis',
                'jam_buka' => '08:00 - 16:00',
                'gambar' => '/images/tampaksiring-newpict1.jpg',
                'gambar2' => '/images/istana-tampak siring.jpg',
                'gambar3' => '/images/istana-tampaksiring-new.jpg',
                'rating' => 4.4,
                'fasilitas' => ['Taman', 'Museum', 'Pemandu', 'Area Parkir']
            ],
            [
                'id' => 7,
                'nama' => 'Air Terjun Tukad Cepung',
                'deskripsi' => 'Air terjun tersembunyi dengan dinding bebatuan yang megah. Sinar matahari menembus celah bebatuan menciptakan efek cahaya yang dramatis. Tempat favorit untuk berfoto karena keunikan alamnya.',
                'lokasi' => 'Kecamatan Bangli, Karangasem',
                'kategori' => 'Air Terjun',
                'harga' => 'Rp 15.000',
                'jam_buka' => '08:00 - 17:00',
                'gambar' => '/images/tukad-cepung-gambar2.jpg',
                'gambar2' => '/images/tukad_cepung_bali17.jpg',
                'gambar3' => '/images/tukadcepungaeshtetik.jpg',
                'rating' => 4.8,
                'fasilitas' => ['Parkir', 'Toilet', 'Warung Makan', 'Spot Foto']
            ],
            [
                'id' => 8,
                'nama' => 'Pantai Virgin Beach',
                'deskripsi' => 'Pantai pasir putih dengan air laut yang jernih dan tenang. Dikelilingi tebing hijau yang membuat suasana semakin eksotis. Sangat cocok untuk berenang dan bersantai.',
                'lokasi' => 'Kecamatan Karangasem, Karangasem',
                'kategori' => 'Pantai',
                'harga' => 'Rp 15.000',
                'jam_buka' => '08:00 - 18:00',
                'gambar' => '/images/virginbeachhotel.jpg',
                'gambar2' => '/images/virgin_beach3.jpg',
                'gambar3' => '/images/virgin-beach1.jpg',
                'rating' => 4.8,
                'fasilitas' => ['Parkir', 'Toilet', 'Warung Makan', 'Sewa Kursi']
            ],
            [
                'id' => 9,
                'nama' => 'Desa Tenganan',
                'deskripsi' => 'Desa adat Bali Aga yang masih mempertahankan tradisi asli. Terkenal dengan tenunan geringsing dan perayaan Perang Pandan. Arsitektur rumah tradisional masih sangat terjaga.',
                'lokasi' => 'Kecamatan Manggis, Karangasem',
                'kategori' => 'Budaya',
                'harga' => 'Gratis',
                'jam_buka' => '08:00 - 17:00',
                'gambar' => '/images/Desa-tenganan-Perang-Pandang-.jpg',
                'gambar2' => '/images/Desa-Adat-tenganan-lastpict.jpg',
                'gambar3' => '/images/Desa-Tengan-Tradisional-Saat-Perang-Pandan.jpg',
                'rating' => 4.7,
                'fasilitas' => ['Area Parkir', 'Toilet', 'Warung', 'Pemandu']
            ],
            [
                'id' => 10,
                'nama' => 'Taman Ujung Sukasada',
                'deskripsi' => 'Istana air peninggalan Kerajaan Karangasem dengan arsitektur Eropa dan Bali. Memiliki kolam besar dan jembatan yang indah. Spot favorit untuk prewedding.',
                'lokasi' => 'Kecamatan Bebandem, Karangasem',
                'kategori' => 'Taman Air',
                'harga' => 'Rp 35.000',
                'jam_buka' => '08:00 - 19:00',
                'gambar' => '/images/taman-ujung-sukasad1.jpg',
                'gambar2' => '/images/tamanujung-bali.jpg',
                'gambar3' => '/images/taman-ujung-sukasada2.jpg',
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

    // TAMBAHKAN METHOD INI
    public function storeKomentar(Request $request)
    {
        $request->validate([
            'wisata_id' => 'required|integer',
            'content' => 'required|string|max:500',
        ]);

        $komentar = new Comment();
        $komentar->wisata_id = $request->wisata_id;
        $komentar->user_id = auth()->id();
        $komentar->content = $request->content;
        $komentar->save();

        return redirect()->back()->with('success', 'Komentar berhasil dikirim!');
    }
}