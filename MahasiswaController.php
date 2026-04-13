<?php
// Memuat file konfigurasi database dan model yang diperlukan
require_once 'config/Database.php';
require_once 'models/MahasiswaModel.php';

// Class Controller bertugas sebagai "jembatan" pengatur logika antara Model (Data) dan View (Tampilan)
class MahasiswaController {
    // Properti untuk menyimpan instance dari Model agar bisa diakses oleh semua method di class ini
    private $model;

    // Constructor ini akan dijalankan secara otomatis pertama kali saat class diinisialisasi di index.php
    public function __construct() {
        // Membuat objek database dan mendapatkan koneksi aktifnya
        $database = new Database();
        $db = $database->getConnection();
        
        // Mengirim koneksi database tersebut (Dependency Injection) ke dalam Model 
        // agar model bisa langsung berinteraksi dengan tabel database
        $this->model = new MahasiswaModel($db);
    }

    // Method default untuk mengambil daftar mahasiswa dan menampilkannya ke layar
    public function index() {
        // Mengambil statement hasil query dari database melalui method read() di Model
        $stmt = $this->model->read();
        // Mengubah hasil statement tersebut menjadi bentuk array asosiatif (key-value) agar mudah dilooping
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Memuat file View (HTML) dan menyisipkan variabel $data ke dalamnya untuk ditampilkan
        require_once 'views/list.php';
    }

    
}
?>
