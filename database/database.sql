-- =============================================
-- DATABASE: pesona_karangasem
-- SISTEM INFORMASI PARIWISATA KARANGASEM
-- =============================================

CREATE DATABASE IF NOT EXISTS pesona_karangasem;
USE pesona_karangasem;

-- =============================================
-- 1. TABEL WISATAWAN
-- =============================================
CREATE TABLE wisatawan (
    id_wisatawan INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    no_telepon VARCHAR(15),
    alamat TEXT,
    tanggal_daftar DATE DEFAULT CURRENT_DATE
);

-- =============================================
-- 2. TABEL DESTINASI
-- =============================================
CREATE TABLE destinasi (
    id_destinasi INT PRIMARY KEY AUTO_INCREMENT,
    nama_destinasi VARCHAR(150) NOT NULL,
    kategori ENUM('Alam', 'Budaya', 'Religi', 'Kuliner') NOT NULL,
    lokasi VARCHAR(200) NOT NULL,
    deskripsi TEXT,
    harga_tiket DECIMAL(10,2) DEFAULT 0,
    jam_buka TIME,
    jam_tutup TIME,
    CONSTRAINT cek_harga_tiket CHECK (harga_tiket >= 0)
);

-- =============================================
-- 3. TABEL KULINER
-- =============================================
CREATE TABLE kuliner (
    id_kuliner INT PRIMARY KEY AUTO_INCREMENT,
    nama_makanan VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    harga DECIMAL(10,2) DEFAULT 0,
    lokasi_penjual VARCHAR(200),
    CONSTRAINT cek_harga_kuliner CHECK (harga >= 0)
);

-- =============================================
-- 4. TABEL PENGINAPAN
-- =============================================
CREATE TABLE penginapan (
    id_penginapan INT PRIMARY KEY AUTO_INCREMENT,
    nama_penginapan VARCHAR(100) NOT NULL,
    jenis ENUM('Hotel', 'Villa', 'Homestay', 'Resort') NOT NULL,
    alamat VARCHAR(200) NOT NULL,
    harga_per_malam DECIMAL(10,2) NOT NULL,
    rating DECIMAL(2,1) DEFAULT 0,
    fasilitas TEXT,
    CONSTRAINT cek_rating CHECK (rating BETWEEN 0 AND 5),
    CONSTRAINT cek_harga_penginapan CHECK (harga_per_malam >= 0)
);

-- =============================================
-- 5. TABEL ULASAN (One-to-Many dengan Wisatawan & Destinasi)
-- =============================================
CREATE TABLE ulasan (
    id_ulasan INT PRIMARY KEY AUTO_INCREMENT,
    id_wisatawan INT NOT NULL,
    id_destinasi INT NOT NULL,
    rating DECIMAL(2,1) NOT NULL,
    komentar TEXT,
    tanggal_ulasan DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_ulasan_wisatawan FOREIGN KEY (id_wisatawan) 
        REFERENCES wisatawan(id_wisatawan) ON DELETE CASCADE,
    CONSTRAINT fk_ulasan_destinasi FOREIGN KEY (id_destinasi) 
        REFERENCES destinasi(id_destinasi) ON DELETE CASCADE,
    CONSTRAINT cek_rating_ulasan CHECK (rating BETWEEN 0 AND 5)
);

-- =============================================
-- 6. TABEL PENGHUBUNG: Wisatawan_Destinasi (Many-to-Many)
-- =============================================
CREATE TABLE wisatawan_destinasi (
    id_wisatawan INT NOT NULL,
    id_destinasi INT NOT NULL,
    tanggal_kunjungan DATE,
    PRIMARY KEY (id_wisatawan, id_destinasi),
    FOREIGN KEY (id_wisatawan) REFERENCES wisatawan(id_wisatawan) ON DELETE CASCADE,
    FOREIGN KEY (id_destinasi) REFERENCES destinasi(id_destinasi) ON DELETE CASCADE
);

-- =============================================
-- 7. TABEL PENGHUBUNG: Wisatawan_Penginapan (Many-to-Many)
-- =============================================
CREATE TABLE wisatawan_penginapan (
    id_wisatawan INT NOT NULL,
    id_penginapan INT NOT NULL,
    tanggal_checkin DATE NOT NULL,
    tanggal_checkout DATE,
    PRIMARY KEY (id_wisatawan, id_penginapan, tanggal_checkin),
    FOREIGN KEY (id_wisatawan) REFERENCES wisatawan(id_wisatawan) ON DELETE CASCADE,
    FOREIGN KEY (id_penginapan) REFERENCES penginapan(id_penginapan) ON DELETE CASCADE,
    CONSTRAINT cek_tanggal CHECK (tanggal_checkout IS NULL OR tanggal_checkout > tanggal_checkin)
);

-- =============================================
-- 8. TABEL PENGHUBUNG: Destinasi_Kuliner (Many-to-Many)
-- =============================================
CREATE TABLE destinasi_kuliner (
    id_destinasi INT NOT NULL,
    id_kuliner INT NOT NULL,
    PRIMARY KEY (id_destinasi, id_kuliner),
    FOREIGN KEY (id_destinasi) REFERENCES destinasi(id_destinasi) ON DELETE CASCADE,
    FOREIGN KEY (id_kuliner) REFERENCES kuliner(id_kuliner) ON DELETE CASCADE
);

-- =============================================
-- 9. INDEX untuk Optimasi Query
-- =============================================
CREATE INDEX idx_wisatawan_email ON wisatawan(email);
CREATE INDEX idx_destinasi_kategori ON destinasi(kategori);
CREATE INDEX idx_destinasi_lokasi ON destinasi(lokasi);
CREATE INDEX idx_ulasan_tanggal ON ulasan(tanggal_ulasan);
CREATE INDEX idx_penginapan_rating ON penginapan(rating);
CREATE INDEX idx_kuliner_harga ON kuliner(harga);

-- =============================================
-- 10. VIEW untuk Laporan Populer
-- =============================================

-- View: Destinasi dengan rating tertinggi
CREATE VIEW v_destinasi_terbaik AS
SELECT 
    d.id_destinasi,
    d.nama_destinasi,
    d.kategori,
    AVG(u.rating) AS rata_rata_rating,
    COUNT(u.id_ulasan) AS jumlah_ulasan
FROM destinasi d
LEFT JOIN ulasan u ON d.id_destinasi = u.id_destinasi
GROUP BY d.id_destinasi
ORDER BY rata_rata_rating DESC;

-- View: Wisatawan paling aktif
CREATE VIEW v_wisatawan_aktif AS
SELECT 
    w.id_wisatawan,
    w.nama,
    w.email,
    COUNT(DISTINCT wd.id_destinasi) AS destinasi_dikunjungi,
    COUNT(DISTINCT u.id_ulasan) AS jumlah_ulasan
FROM wisatawan w
LEFT JOIN wisatawan_destinasi wd ON w.id_wisatawan = wd.id_wisatawan
LEFT JOIN ulasan u ON w.id_wisatawan = u.id_wisatawan
GROUP BY w.id_wisatawan
ORDER BY destinasi_dikunjungi DESC;

-- =============================================
-- 11. Contoh Data Awal (Seeder)
-- =============================================

-- Insert Wisatawan
INSERT INTO wisatawan (nama, email, no_telepon, alamat) VALUES
('I Made Wijaya', 'made@email.com', '081234567890', 'Denpasar, Bali'),
('Ni Luh Putri', 'putri@email.com', '081298765432', 'Singaraja, Bali');

-- Insert Destinasi
INSERT INTO destinasi (nama_destinasi, kategori, lokasi, deskripsi, harga_tiket) VALUES
('Tirta Gangga', 'Budaya', 'Karangasem, Bali', 'Taman air kerajaan dengan kolam ikan koi', 50000),
('Pantai Virgin', 'Alam', 'Bugbug, Karangasem', 'Pantai pasir putih yang masih alami', 20000);

-- Insert Penginapan
INSERT INTO penginapan (nama_penginapan, jenis, alamat, harga_per_malam, rating, fasilitas) VALUES
('Puri Bagus Candidasa', 'Resort', 'Candidasa, Karangasem', 1500000, 4.5, 'Kolam renang, Spa, Restoran'),
('Homestay Surya', 'Homestay', 'Amlapura, Karangasem', 250000, 4.2, 'WiFi, AC, Sarapan');

-- Insert Kuliner
INSERT INTO kuliner (nama_makanan, deskripsi, harga, lokasi_penjual) VALUES
('Tipat Cantok', 'Ketupat dengan sayur dan bumbu kacang khas Bali', 15000, 'Pasar Amlapura'),
('Babi Guling', 'Babi guling dengan bumbu rempah khas Karangasem', 50000, 'Jalan Diponegoro');

-- Insert Ulasan
INSERT INTO ulasan (id_wisatawan, id_destinasi, rating, komentar) VALUES
(1, 1, 4.8, 'Tempatnya sangat indah dan bersih, recommended!');

-- Hubungkan Wisatawan dengan Destinasi
INSERT INTO wisatawan_destinasi (id_wisatawan, id_destinasi, tanggal_kunjungan) VALUES
(1, 1, '2025-06-15');

-- Hubungkan Destinasi dengan Kuliner
INSERT INTO destinasi_kuliner (id_destinasi, id_kuliner) VALUES
(1, 1);

-- =============================================
-- SELESAI
-- =============================================