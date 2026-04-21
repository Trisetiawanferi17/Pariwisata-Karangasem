<?php

// =============================================
// PARENT CLASS: Destinasi
// =============================================
class Destinasi {
    protected $id_destinasi;
    protected $nama_destinasi;
    protected $lokasi;
    protected $harga_tiket;
    
    public function __construct($nama, $lokasi, $harga) {
        $this->nama_destinasi = $nama;
        $this->lokasi = $lokasi;
        $this->harga_tiket = $harga;
    }
    
    // Method yang akan di-override
    public function getInfoDestinasi() {
        return "Destinasi: " . $this->nama_destinasi . " - Lokasi: " . $this->lokasi;
    }
    
    public function hitungBiayaKunjungan($jumlah_orang) {
        return $this->harga_tiket * $jumlah_orang;
    }
}

// =============================================
// CHILD CLASS 1: DestinasiAlam (Override)
// =============================================
class DestinasiAlam extends Destinasi {
    private $tingkat_kesulitan;
    
    public function __construct($nama, $lokasi, $harga, $tingkat_kesulitan) {
        parent::__construct($nama, $lokasi, $harga);
        $this->tingkat_kesulitan = $tingkat_kesulitan;
    }
    
    // OVERRIDE - perilaku berbeda
    public function getInfoDestinasi() {
        return "🌲 DESTINASI ALAM: " . $this->nama_destinasi . 
               " | Lokasi: " . $this->lokasi . 
               " | Tingkat Kesulitan: " . $this->tingkat_kesulitan;
    }
    
    // OVERRIDE - dengan tambahan biaya guide
    public function hitungBiayaKunjungan($jumlah_orang) {
        $biaya_guide = 50000 * $jumlah_orang;
        $total = parent::hitungBiayaKunjungan($jumlah_orang) + $biaya_guide;
        return $total;
    }
}

// =============================================
// CHILD CLASS 2: DestinasiBudaya (Override)
// =============================================
class DestinasiBudaya extends Destinasi {
    private $ada_upacara;
    
    public function __construct($nama, $lokasi, $harga, $ada_upacara) {
        parent::__construct($nama, $lokasi, $harga);
        $this->ada_upacara = $ada_upacara;
    }
    
    // OVERRIDE - perilaku berbeda
    public function getInfoDestinasi() {
        $info = "🏛️ DESTINASI BUDAYA: " . $this->nama_destinasi . 
                " | Lokasi: " . $this->lokasi;
        if ($this->ada_upacara) {
            $info .= " | ⚡ Ada upacara adat hari ini!";
        }
        return $info;
    }
    
    // OVERRIDE - dengan tambahan biaya donasi
    public function hitungBiayaKunjungan($jumlah_orang) {
        $biaya_donasi = 20000 * $jumlah_orang;
        $total = parent::hitungBiayaKunjungan($jumlah_orang) + $biaya_donasi;
        return $total;
    }
}

// =============================================
// EKSEKUSI / MENJALANKAN KODE
// =============================================

echo "<h1>POLIMORFISME - METHOD OVERRIDING</h1>";
echo "<h3>Sistem Informasi Pariwisata Pesona Karangasem</h3>";
echo "<hr>";

// Membuat array objek destinasi
$destinasi_list = [
    new DestinasiAlam("Pantai Virgin", "Bugbug, Karangasem", 20000, "Mudah"),
    new DestinasiBudaya("Tirta Gangga", "Karangasem", 50000, true),
    new DestinasiAlam("Air Terjun Tukad Cepung", "Bangli", 15000, "Sedang")
];

// Menampilkan hasil dalam bentuk tabel
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr style='background-color: #4CAF50; color: white;'>";
echo "<th>No</th>";
echo "<th>Info Destinasi</th>";
echo "<th>Biaya untuk 2 Orang</th>";
echo "</tr>";

$no = 1;
foreach ($destinasi_list as $destinasi) {
    echo "<tr>";
    echo "<td>" . $no++ . "</td>";
    echo "<td>" . $destinasi->getInfoDestinasi() . "</td>";
    echo "<td align='right'>Rp " . number_format($destinasi->hitungBiayaKunjungan(2), 0, ',', '.') . "</td>";
    echo "</tr>";
}
echo "</table>";

echo "<hr>";
echo "<p><strong>Kesimpulan:</strong> Method <code>getInfoDestinasi()</code> dan <code>hitungBiayaKunjungan()</code> ";
echo "memiliki perilaku yang berbeda pada setiap class turunan, tetapi dipanggil dengan cara yang sama.</p>";