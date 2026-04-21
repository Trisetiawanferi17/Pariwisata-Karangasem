<?php

// =============================================
// ABSTRAKSI (ABSTRACT CLASS)
// Sistem Informasi Pariwisata Pesona Karangasem
// =============================================

// ABSTRACT CLASS
abstract class Laporan {
    protected $tanggal_cetak;
    protected $nama_laporan;
    
    public function __construct($nama_laporan) {
        $this->nama_laporan = $nama_laporan;
        $this->tanggal_cetak = date('Y-m-d H:i:s');
    }
    
    // METHOD KONKRET (bisa langsung digunakan)
    public function getTanggalCetak() {
        return $this->tanggal_cetak;
    }
    
    // METHOD ABSTRAK (harus diimplementasikan oleh child class)
    abstract public function generateData();
    abstract public function formatOutput();
    abstract public function export();
    
    // TEMPLATE METHOD (menggabungkan method abstrak)
    public function cetakLaporan() {
        $data = $this->generateData();
        $output = $this->formatOutput();
        return $this->export();
    }
}

// CLASS KONKRET 1: Laporan Destinasi Populer
class LaporanDestinasiPopuler extends Laporan {
    private $tahun;
    private $min_rating;
    
    public function __construct($tahun, $min_rating = 4.0) {
        parent::__construct("Laporan Destinasi Populer");
        $this->tahun = $tahun;
        $this->min_rating = $min_rating;
    }
    
    // IMPLEMENTASI method abstrak
    public function generateData() {
        // Simulasi query ke database
        return [
            ["id" => 1, "nama" => "Tirta Gangga", "rating" => 4.8, "jumlah_pengunjung" => 15000],
            ["id" => 2, "nama" => "Pantai Virgin", "rating" => 4.6, "jumlah_pengunjung" => 12000],
            ["id" => 3, "nama" => "Puri Agung Karangasem", "rating" => 4.5, "jumlah_pengunjung" => 8000]
        ];
    }
    
    public function formatOutput() {
        $data = $this->generateData();
        $output = "========== " . $this->nama_laporan . " ==========\n";
        $output .= "Tahun: " . $this->tahun . " | Minimal Rating: " . $this->min_rating . "\n";
        $output .= "Tanggal Cetak: " . $this->getTanggalCetak() . "\n\n";
        $output .= "No | Nama Destinasi | Rating | Pengunjung\n";
        $output .= "----------------------------------------\n";
        
        foreach ($data as $index => $item) {
            $output .= ($index+1) . "  | " . $item['nama'] . " | " . $item['rating'] . " | " . $item['jumlah_pengunjung'] . "\n";
        }
        return $output;
    }
    
    public function export() {
        return $this->formatOutput();
    }
}

// CLASS KONKRET 2: Laporan Aktivitas Wisatawan
class LaporanAktivitasWisatawan extends Laporan {
    private $bulan;
    private $tahun;
    
    public function __construct($bulan, $tahun) {
        parent::__construct("Laporan Aktivitas Wisatawan");
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }
    
    // IMPLEMENTASI method abstrak (perilaku berbeda)
    public function generateData() {
        // Simulasi query ke database
        return [
            ["wisatawan" => "I Made Wijaya", "ulasan" => 5, "destinasi_dikunjungi" => 3],
            ["wisatawan" => "Ni Luh Putri", "ulasan" => 8, "destinasi_dikunjungi" => 4],
            ["wisatawan" => "Ketut Suardana", "ulasan" => 2, "destinasi_dikunjungi" => 2]
        ];
    }
    
    public function formatOutput() {
        $data = $this->generateData();
        $output = "========== " . $this->nama_laporan . " ==========\n";
        $output .= "Periode: " . $this->bulan . "/" . $this->tahun . "\n";
        $output .= "Tanggal Cetak: " . $this->getTanggalCetak() . "\n\n";
        $output .= "No | Nama Wisatawan | Jml Ulasan | Destinasi Dikunjungi\n";
        $output .= "----------------------------------------------------\n";
        
        foreach ($data as $index => $item) {
            $output .= ($index+1) . "  | " . $item['wisatawan'] . " | " . $item['ulasan'] . " | " . $item['destinasi_dikunjungi'] . "\n";
        }
        return $output;
    }
    
    public function export() {
        return $this->formatOutput();
    }
}

// =============================================
// EKSEKUSI / MENJALANKAN KODE
// =============================================

echo "<!DOCTYPE html>";
echo "<html>";
echo "<head><title>Abstraksi - Pesona Karangasem</title>";
echo "<style>
    body { font-family: Arial, sans-serif; margin: 20px; background-color: #f0f0f0; }
    .container { background-color: white; padding: 20px; border-radius: 10px; max-width: 800px; margin: auto; }
    h1 { color: #2c3e50; text-align: center; }
    h3 { color: #16a085; }
    pre { background-color: #2c3e50; color: #ecf0f1; padding: 15px; border-radius: 5px; font-family: monospace; overflow-x: auto; }
    hr { border: 1px solid #16a085; }
    .footer { text-align: center; margin-top: 20px; color: #7f8c8d; }
</style>";
echo "</head>";
echo "<body>";
echo "<div class='container'>";

echo "<h1>🏛️ PESONA KARANGASEM</h1>";
echo "<h3>ABSTRAKSI - Sistem Laporan</h3>";
echo "<hr>";

echo "<pre>";

$laporan_destinasi = new LaporanDestinasiPopuler(2025, 4.5);
echo $laporan_destinasi->cetakLaporan();

echo "\n\n";
echo "-------------------------------------------------------------------------------\n\n";

$laporan_wisatawan = new LaporanAktivitasWisatawan(12, 2025);
echo $laporan_wisatawan->cetakLaporan();

echo "</pre>";

echo "<hr>";
echo "<p><strong>📌 Penjelasan Abstraksi:</strong></p>";
echo "<ul>";
echo "<li>Class <code>Laporan</code> adalah <strong>abstract class</strong> yang tidak bisa di-instansiasi langsung.</li>";
echo "<li>Method <code>generateData()</code>, <code>formatOutput()</code>, dan <code>export()</code> adalah <strong>method abstrak</strong> yang wajib diimplementasikan oleh child class.</li>";
echo "<li>Setiap child class (<code>LaporanDestinasiPopuler</code> dan <code>LaporanAktivitasWisatawan</code>) mengimplementasikan method tersebut dengan <strong>perilaku yang berbeda</strong>.</li>";
echo "<li>Method <code>cetakLaporan()</code> adalah <strong>template method</strong> yang memanggil method abstrak secara berurutan.</li>";
echo "</ul>";

echo "<div class='footer'>";
echo "<p>Sistem Informasi Pariwisata Pesona Karangasem &copy; 2025</p>";
echo "</div>";

echo "</div>";
echo "</body>";
echo "</html>";
?>