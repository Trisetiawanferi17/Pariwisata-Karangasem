<?php

class Ulasan {
    private $rating;
    private $komentar;
    
    public function setRating($rating) {
        if ($rating >= 1 && $rating <= 5) {
            $this->rating = $rating;
            return true;
        } else {
            return false;
        }
    }
    
    public function getRating() {
        return $this->rating;
    }
    
    public function setKomentar($komentar) {
        if (!empty(trim($komentar))) {
            $this->komentar = $komentar;
            return true;
        } else {
            return false;
        }
    }
    
    public function getKomentar() {
        return $this->komentar;
    }
}

// Testing
echo "=== TEST ENKAPSULASI ===\n\n";

$ulasan = new Ulasan();

// Test 1: Rating valid
echo "Test 1: Rating 4.5\n";
if ($ulasan->setRating(4.5)) {
    echo "✓ Rating berhasil: " . $ulasan->getRating() . "\n";
} else {
    echo "✗ Rating gagal\n";
}

// Test 2: Rating tidak valid
echo "\nTest 2: Rating 6\n";
if ($ulasan->setRating(6)) {
    echo "✓ Rating berhasil: " . $ulasan->getRating() . "\n";
} else {
    echo "✗ Rating gagal (harus 1-5)\n";
}

// Test 3: Komentar valid
echo "\nTest 3: Komentar 'Bagus sekali'\n";
if ($ulasan->setKomentar("Bagus sekali")) {
    echo "✓ Komentar berhasil: " . $ulasan->getKomentar() . "\n";
} else {
    echo "✗ Komentar gagal\n";
}

// Test 4: Komentar kosong
echo "\nTest 4: Komentar kosong\n";
if ($ulasan->setKomentar("")) {
    echo "✓ Komentar berhasil\n";
} else {
    echo "✗ Komentar gagal (tidak boleh kosong)\n";
}

echo "\n=== SELESAI ===\n";
?>