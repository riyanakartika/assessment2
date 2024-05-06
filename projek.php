<?php
// Koneksi ke database
include("koneksidb.php");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Buat query untuk mengambil data obat
$sql = "SELECT * FROM penjualan";

// Jalankan query
$result = mysqli_query($conn, $sql);

// Periksa hasil query
if (mysqli_num_rows($result) > 0) {
    // Inisialisasi array untuk menampung data laporan
    $data = [];

    // Ambil data laporan dari setiap baris hasil query
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Konversi array data laporan ke format JSON
    $json = json_encode($data, JSON_PRETTY_PRINT);

    // Tampilkan data laporan dalam format JSON
    echo $json;
} else {
    echo "Tidak ada data laporan yang ditemukan.";
}

// Tutup koneksi database
mysqli_close($conn);

?>