<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa - Pemrograman Web</title>
    <!-- Menggunakan framework CSS Bootstrap 5 (via CDN) untuk membuat tampilan tabel menjadi rapi dan responsif secara instan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Mahasiswa - Nilai Tugas Web</h4>
        </div>
        <div class="card-body">
            <!-- Tabel Data -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Kelas</th>
                            <th>Nilai Tugas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Mengecek apakah variabel $data yang dikirim dari Controller memiliki minimal 1 baris data -->
                        <?php if(count($data) > 0): ?>
                            <!-- Melakukan perulangan (looping) untuk memecah array $data menjadi per baris ($row) -->
                            <?php $no = 1; foreach($data as $row): ?>
                            <tr>
                                <!-- Menampilkan nomor urut yang akan bertambah satu setiap barisnya -->
                                <td><?= $no++ ?></td>
                                <!-- Fungsi htmlspecialchars() digunakan untuk membersihkan karakter khusus HTML (Mencegah serangan celah keamanan XSS / Cross-Site Scripting) -->
                                <td><?= htmlspecialchars($row['nim']) ?></td>
                                <td><?= htmlspecialchars($row['nama']) ?></td>
                                <td><?= htmlspecialchars($row['kelas']) ?></td>
                                <td><?= htmlspecialchars($row['nilai_tugas']) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- Jika array $data ternyata kosong (tidak ada data di database), maka baris ini yang akan dieksekusi -->
                            <tr><td colspan="5" class="text-center">Data tidak ditemukan</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Memuat file Javascript dari Bootstrap agar elemen yang bersifat interaktif pada framework berfungsi dengan baik -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>