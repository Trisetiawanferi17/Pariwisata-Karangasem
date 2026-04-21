<?php
// PARENT CLASS
class Pengguna {
    protected $nama;
    protected $email;
    
    public function __construct($nama, $email) {
        $this->nama = $nama;
        $this->email = $email;
    }
    
    public function getInfo() {
        return "Nama: " . $this->nama . ", Email: " . $this->email;
    }
}

// CHILD CLASS: ADMIN
class Admin extends Pengguna {
    public function getRole() {
        return "Administrator";
    }
}

// EKSEKUSI
$admin = new Admin("Feri Tri Setiawan", "feri@pesona.com");
echo "<h1>TEST - Pewarisan</h1>";
echo "Nama Admin: " . $admin->getInfo() . "<br>";
echo "Role: " . $admin->getRole();
?>