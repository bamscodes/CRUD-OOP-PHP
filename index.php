<?php
// Tampilkan error jika ada masalah syntax (Sangat berguna selama tahap development untuk proses debugging)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Memuat (require) file controller agar class MahasiswaController dapat dikenali dan digunakan
require_once 'controllers/MahasiswaController.php';

// Inisiasi objek Controller (Membuat instance dari class MahasiswaController)
$controller = new MahasiswaController();

// Panggil method index() yang ada di dalam Controller yang berfungsi untuk merender tampilan data utama
$controller->index();
?>