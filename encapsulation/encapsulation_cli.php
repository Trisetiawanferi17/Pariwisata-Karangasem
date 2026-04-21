<?php

// =============================================
// ENKAPSULASI (ENCAPSULATION) - VERSI CLI
// Getter dan Setter dengan Validasi
// Sistem Informasi Pariwisata Pesona Karangasem
// =============================================

class Ulasan {
    // Atribut private (disembunyikan)
    private $id_ulasan;
    private $id_wisatawan;
    private $id_destinasi;
    private $rating;
    private $komentar;
    private $tanggal_ulasan;
    
    // Constructor
    public function __construct($id_wisatawan, $id_destinasi, $rating, $komentar) {
        $this->id_wisatawan = $id_wisatawan;
        $this->id_destinasi = $id_destinasi;
        $this->setRating($rating);
        $this->setKomentar($komentar);
        $this->tanggal_ulasan = date('Y-m-d H:i:s');
    }
    
    // GETTER untuk rating
    public function getRating() {
        return $this->rating;
    }
    
    // SETTER untuk rating dengan VALIDASI
    public function setRating($rating) {
        if ($rating >= 1 && $rating <= 5) {
            $this->rating = $rating;
            return true;
        } else {
            throw new Exception("ERROR: Rating harus antara 1 sampai 5. Anda memasukkan: " . $rating);
        }
    }
    
    // GETTER untuk komentar
    public function getKomentar() {
        return $this->komentar;
    }
    
    // SETTER untuk komentar dengan VALIDASI
    public function setKomentar($komentar) {
        if (!empty(trim($komentar))) {
            $this->komentar = htmlspecialchars($komentar, ENT_QUOTES, 'UTF-8');
            return true;
        } else {
            throw new Exception("ERROR: Komentar tidak boleh kosong!");
        }
    }
    
    public function getTanggalUlasan() {
        return $this->tanggal_ulasan;
    }
}

// =============================================
// EKSEKUSI / MENJALANKAN KODE (VERSI CLI)
// =============================================

echo "========================================\n";
echo "   PESONA KARANGASEM - ENKAPSULASI\n";
echo "========================================\n";
echo "Getter dan Setter dengan Validasi\n\n";

echo "📌 Atribut Private (Disembunyikan):\n";
echo "   - id_ulasan, id_wisatawan, id_destinasi\n";
echo "   - rating, komentar, tanggal_ulasan\n\n";

echo "🔐 Validasi yang diterapkan:\n";
echo "   - Rating: harus antara 1-5\n";
echo "   - Komentar: tidak boleh kosong\n\n";

echo str_repeat("-", 50) . "\n\n";

// Contoh 1: Data VALID
echo "✅ Contoh 1: Data Valid (Rating 4.8)\n";
try {
    $ulasan = new Ulasan(1, 1, 4.8, "Tempatnya sangat indah!");
    echo "   ⭐ ULASAN BERHASIL DISIMPAN\n";
    echo "   📝 Rating: " . $ulasan->getRating() . "\n";
    echo "   💬 Komentar: " . $ulasan->getKomentar() . "\n";
    echo "   📅 Tanggal: " . $ulasan->getTanggalUlasan() . "\n";
} catch (Exception $e) {
    echo "   ❌ Error: " . $e->getMessage() . "\n";
}

echo "\n" . str_repeat("-", 50) . "\n\n";

// Contoh 2: Rating TIDAK VALID
echo "❌ Contoh 2: Data Tidak Valid (Rating = 6)\n";
try {
    $ulasan_error = new Ulasan(1, 1, 6, "Test");
    echo "   Ulasan tersimpan: Rating " . $ulasan_error->getRating() . "\n";
} catch (Exception $e) {
    echo "   ❌ Error: " . $e->getMessage() . "\n";
}

echo "\n" . str_repeat("-", 50) . "\n\n";

// Contoh 3: Komentar KOSONG
echo "❌ Contoh 3: Data Tidak Valid (Komentar Kosong)\n";
try {
    $ulasan_error2 = new Ulasan(1, 1, 4, "");
    echo "   Ulasan tersimpan: " . $ulasan_error2->getKomentar() . "\n";
} catch (Exception $e) {
    echo "   ❌ Error: " . $e->getMessage() . "\n";
}

echo "\n" . str_repeat("-", 50) . "\n\n";

// Contoh 4: Mengubah Rating dengan Setter
echo "🔄 Contoh 4: Mengubah Rating menggunakan Setter\n";
try {
    $ulasan2 = new Ulasan(2, 1, 3, "Destinasinya bagus!");
    echo "   Rating awal: " . $ulasan2->getRating() . "\n";
    
    $ulasan2->setRating(5);
    echo "   Rating setelah diubah: " . $ulasan2->getRating() . "\n";
    echo "   Komentar: " . $ulasan2->getKomentar() . "\n";
} catch (Exception $e) {
    echo "   ❌ Error: " . $e->getMessage() . "\n";
}

echo "\n" . str_repeat("=", 50) . "\n";
echo "📌 Penjelasan Enkapsulasi:\n";
echo "   - Atribut private disembunyikan dari akses langsung\n";
echo "   - Getter digunakan untuk mengambil nilai\n";
echo "   - Setter digunakan untuk mengubah nilai dengan validasi\n";
echo "   - Validasi rating: 1-5\n";
echo "   - Validasi komentar: tidak boleh kosong\n";
echo "   - htmlspecialchars() mencegah serangan XSS\n";
echo "========================================\n";
?>