<?php

// =============================================
// SIMULASI METHOD OVERLOADING DENGAN __call
// =============================================

class WisatawanService {
    
    // Simulasi overloading menggunakan __call magic method
    public function __call($name, $arguments) {
        if ($name == 'cariDestinasi') {
            $jumlah_arg = count($arguments);
            
            if ($jumlah_arg == 1 && is_string($arguments[0])) {
                // Cari berdasarkan nama
                return $this->cariDestinasiByNama($arguments[0]);
            } 
            elseif ($jumlah_arg == 2 && is_string($arguments[0]) && is_string($arguments[1])) {
                // Cari berdasarkan kategori dan lokasi
                return $this->cariDestinasiByKategoriLokasi($arguments[0], $arguments[1]);
            }
            elseif ($jumlah_arg == 1 && is_numeric($arguments[0])) {
                // Cari berdasarkan ID
                return $this->cariDestinasiById($arguments[0]);
            }
        }
        return "Method $name tidak ditemukan";
    }
    
    private function cariDestinasiByNama($nama) {
        return "Menampilkan destinasi dengan nama: " . $nama;
    }
    
    private function cariDestinasiByKategoriLokasi($kategori, $lokasi) {
        return "Menampilkan destinasi kategori '$kategori' di lokasi '$lokasi'";
    }
    
    private function cariDestinasiById($id) {
        return "Menampilkan destinasi dengan ID: " . $id;
    }
}

// =============================================
// EKSEKUSI / MENJALANKAN KODE
// =============================================

echo "<h1>SIMULASI METHOD OVERLOADING</h1>";
echo "<h3>Sistem Informasi Pariwisata Pesona Karangasem</h3>";
echo "<hr>";

$service = new WisatawanService();

echo "<h4>Contoh 1: Cari berdasarkan NAMA</h4>";
echo $service->cariDestinasi("Pantai Virgin") . "<br><br>";

echo "<h4>Contoh 2: Cari berdasarkan KATEGORI dan LOKASI</h4>";
echo $service->cariDestinasi("Alam", "Karangasem") . "<br><br>";

echo "<h4>Contoh 3: Cari berdasarkan ID</h4>";
echo $service->cariDestinasi(5) . "<br><br>";

echo "<hr>";
echo "<p><strong>Penjelasan:</strong> Method <code>cariDestinasi()</code> dipanggil dengan 3 cara berbeda:<br>";
echo "1. 1 parameter string (nama)<br>";
echo "2. 2 parameter string (kategori, lokasi)<br>";
echo "3. 1 parameter numeric (id)<br>";
echo "PHP tidak mendukung overloading native, tetapi bisa disimulasi dengan magic method <code>__call()</code>.</p>";
?>