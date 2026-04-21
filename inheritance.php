<?php

// =============================================
// PEWARISAN (INHERITANCE)
// Sistem Informasi Pariwisata Pesona Karangasem
// =============================================

// PARENT CLASS
class Pengguna {
    protected $id_pengguna;
    protected $nama;
    protected $email;
    protected $password;
    
    public function __construct($nama, $email, $password) {
        $this->nama = $nama;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    
    // Method yang akan diwarisi (bisa di-override)
    public function login() {
        return $this->nama . " telah login ke sistem.";
    }
    
    public function logout() {
        return $this->nama . " telah logout.";
    }
    
    // Method yang akan di-override oleh child class
    public function getRole() {
        return "Pengguna Umum";
    }
    
    public function getInfo() {
        return "Nama: " . $this->nama . ", Email: " . $this->email;
    }
}

// CHILD CLASS 1: WISATAWAN
class Wisatawan extends Pengguna {
    private $poin_reward;
    private $tanggal_daftar;
    
    public function __construct($nama, $email, $password) {
        parent::__construct($nama, $email, $password);
        $this->poin_reward = 0;
        $this->tanggal_daftar = date('Y-m-d');
    }
    
    // OVERRIDE method getRole
    public function getRole() {
        return "Wisatawan";
    }
    
    // OVERRIDE method getInfo (menambahkan informasi poin)
    public function getInfo() {
        return parent::getInfo() . ", Poin: " . $this->poin_reward . ", Bergabung: " . $this->tanggal_daftar;
    }
    
    // Method khusus Wisatawan
    public function beriUlasan($id_destinasi, $rating, $komentar) {
        return "Wisatawan " . $this->nama . " memberikan rating $rating untuk destinasi ID-$id_destinasi.";
    }
    
    public function tambahPoin($poin) {
        $this->poin_reward += $poin;
        return "Poin bertambah menjadi " . $this->poin_reward;
    }
}

// CHILD CLASS 2: ADMIN
class Admin extends Pengguna {
    private $level_akses;
    private $hak_akses;
    
    public function __construct($nama, $email, $password, $level_akses = "full") {
        parent::__construct($nama, $email, $password);
        $this->level_akses = $level_akses;
        $this->hak_akses = ["kelola_destinasi", "kelola_ulasan", "lihat_laporan"];
    }
    
    // OVERRIDE method getRole
    public function getRole() {
        return "Administrator (Level: " . $this->level_akses . ")";
    }
    
    // OVERRIDE method getInfo
    public function getInfo() {
        return parent::getInfo() . ", Hak Akses: " . implode(", ", $this->hak_akses);
    }
    
    // Method khusus Admin
    public function kelolaDestinasi($id_destinasi, $action) {
        return "Admin " . $this->nama . " melakukan $action pada destinasi ID-$id_destinasi.";
    }
}

// =============================================
// EKSEKUSI / MENJALANKAN KODE
// =============================================

echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>Pewarisan - Pesona Karangasem</title>";
echo "<style>
    body { font-family: Arial, sans-serif; margin: 20px; background-color: #f0f0f0; }
    .container { background-color: white; padding: 20px; border-radius: 10px; max-width: 800px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    h1 { color: #2c3e50; text-align: center; }
    h3 { color: #16a085; border-bottom: 2px solid #16a085; padding-bottom: 10px; }
    .wisatawan { background-color: #e8f8f5; padding: 15px; border-radius: 8px; margin: 15px 0; border-left: 5px solid #16a085; }
    .admin { background-color: #fef9e7; padding: 15px; border-radius: 8px; margin: 15px 0; border-left: 5px solid #f39c12; }
    .label { font-weight: bold; color: #2c3e50; }
    hr { border: 1px solid #16a085; }
    .footer { text-align: center; margin-top: 20px; color: #7f8c8d; font-size: 12px; }
    code { background-color: #ecf0f1; padding: 2px 5px; border-radius: 3px; font-family: monospace; }
</style>";
echo "</head>";
echo "<body>";
echo "<div class='container'>";

echo "<h1>🏛️ PESONA KARANGASEM</h1>";
echo "<h3>PEWARISAN (INHERITANCE) - Class Pengguna, Wisatawan, dan Admin</h3>";
echo "<hr>";

// Contoh Penggunaan
$wisatawan = new Wisatawan("I Made Wijaya", "made@email.com", "rahasia123");
$admin = new Admin("Ni Luh Putri", "admin@pesona.com", "admin123", "super");

echo "<div class='wisatawan'>";
echo "<span class='label'>👤 WISATAWAN</span><br><br>";
echo "📝 " . $wisatawan->login() . "<br>";
echo "🏷️ Role: <strong>" . $wisatawan->getRole() . "</strong><br>";
echo "ℹ️ " . $wisatawan->getInfo() . "<br>";
echo "⭐ " . $wisatawan->beriUlasan(1, 4.8, "Bagus!") . "<br>";
echo "🎁 " . $wisatawan->tambahPoin(10) . "<br>";
echo "</div>";

echo "<div class='admin'>";
echo "<span class='label'>👑 ADMIN</span><br><br>";
echo "📝 " . $admin->login() . "<br>";
echo "🏷️ Role: <strong>" . $admin->getRole() . "</strong><br>";
echo "ℹ️ " . $admin->getInfo() . "<br>";
echo "⚙️ " . $admin->kelolaDestinasi(1, "update") . "<br>";
echo "</div>";

echo "<hr>";
echo "<p><strong>📌 Penjelasan Pewarisan (Inheritance):</strong></p>";
echo "<ul>";
echo "<li>Class <code>Wisatawan</code> dan <code>Admin</code> mewarisi (<strong>extends</strong>) class <code>Pengguna</code>.</li>";
echo "<li>Kedua child class memiliki atribut dan method dari parent class (<code>login()</code>, <code>logout()</code>, <code>getInfo()</code>).</li>";
echo "<li>Method <code>getRole()</code> dan <code>getInfo()</code> di-<strong>override</strong> (ditimpa) dengan perilaku yang berbeda.</li>";
echo "<li>Setiap child class memiliki method <strong>tambahan</strong> yang spesifik (<code>beriUlasan()</code> untuk Wisatawan, <code>kelolaDestinasi()</code> untuk Admin).</li>";
echo "</ul>";

echo "<div class='footer'>";
echo "<p>Sistem Informasi Pariwisata Pesona Karangasem &copy; 2025</p>";
echo "</div>";

echo "</div>";
echo "</body>";
echo "</html>";
?>