<?php
// Class Model bertanggung jawab murni untuk menangani semua interaksi dan kueri langsung dengan Database
class MahasiswaModel {
    // Properti $conn untuk menyimpan koneksi PDO database yang dikirim dari Controller
    private $conn;
    // Properti $table_name untuk mendefinisikan nama tabel yang akan diakses
    private $table_name = "mahasiswa";

    // Constructor ini menerima objek koneksi database ($db) saat class ini dipanggil pertama kali
    public function __construct($db) {
        $this->conn = $db;
    }

    // Method untuk membaca atau mengambil seluruh data dari tabel (Read / Select)
    public function read() {
        // Menyusun kalimat kueri (Query SQL) untuk mengambil semua kolom (*), 
        // kemudian mengurutkannya dari yang terbaru masuk ke database (ORDER BY id DESC)
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";

        // Mempersiapkan statement query untuk dieksekusi oleh library PDO (Prepared Statement)
        $stmt = $this->conn->prepare($query);
        // Mengeksekusi query SQL yang sudah disiapkan di baris sebelumnya
        $stmt->execute();
        
        // Mengembalikan (return) hasil statement mentah tersebut agar nanti bisa diubah menjadi array di dalam Controller
        return $stmt;
    }

    
}
?>
