<?php
echo "Mulai program...\n";

class Ulasan {
    private $rating;
    
    public function setRating($rating) {
        if ($rating >= 1 && $rating <= 5) {
            $this->rating = $rating;
            return true;
        }
        return false;
    }
    
    public function getRating() {
        return $this->rating;
    }
}

echo "Test 1: Rating 4.5\n";
$ulasan = new Ulasan();
if ($ulasan->setRating(4.5)) {
    echo "BERHASIL! Rating = " . $ulasan->getRating() . "\n";
} else {
    echo "GAGAL!\n";
}

echo "Test 2: Rating 6\n";
if ($ulasan->setRating(6)) {
    echo "BERHASIL! Rating = " . $ulasan->getRating() . "\n";
} else {
    echo "GAGAL! (Rating harus 1-5)\n";
}

echo "Selesai.\n";
?>