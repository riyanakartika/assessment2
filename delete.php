<?php
//  menghubungkan ke database
include("koneksidb.php");

// Cek apakah ada parameter ID yang dikirimkan melalui URL
if (isset($_GET['id'])) {
    // Ambil ID dari URL
    $id = $_GET['id'];

    // Query untuk menghapus data proyek berdasarkan ID
    $sql = "DELETE FROM penjualan WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Jika data berhasil dihapus, redirect kembali ke halaman utama dengan pesan sukses
        header("Location: projek.php?hapus=success");
    } else {
        // Jika terjadi kesalahan, redirect kembali ke halaman utama dengan pesan gagal
        header("Location: projek.php?hapus=failed");
    }
} else {
    // Jika tidak ada parameter ID yang dikirimkan, redirect kembali ke halaman utama
    header("Location: projek.php");
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
