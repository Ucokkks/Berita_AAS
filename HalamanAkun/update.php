<?php
include "../Controller/controller.php";
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: log.php');
    exit();
}

$user_id = $_SESSION['user_id']; // Pastikan user_id disimpan dalam session

$judul_berita = '';
$isi_berita = '';
$gambar_berita = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] === 'edit') {
    $judul = $koneksi->real_escape_string($_POST['judul_berita']);
    $isi = $koneksi->real_escape_string($_POST['isi_berita']);
    $tanggal_pembuatan = date('Y-m-d');
    $berita_id = $_POST['berita_id'];

    // Periksa apakah ada gambar yang diunggah
    if (!empty($_FILES['gambar']['name'])) {
        $gambar_name = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $target_dir = "../Gambar/";
        $target_file = $target_dir . basename($gambar_name);

        // Pindahkan file yang diunggah ke direktori tujuan
        if (move_uploaded_file($gambar_tmp, $target_file)) {
            $gambar_path = $target_file;

            // Update berita termasuk gambar baru
            $sql = "UPDATE tb_berita SET judul = '$judul', gambar = '$gambar_path', isi = '$isi', tanggal_pembuatan = '$tanggal_pembuatan' WHERE id = $berita_id AND user_id = $user_id";

            if ($koneksi->query($sql) === TRUE) {
                echo "Berita berhasil diupdate.";
                // Redirect setelah berhasil diupdate
                header("Location: akun.php");
                exit();
            } else {
                echo "Gagal mengupdate berita: " . $koneksi->error;
            }
        } else {
            echo "Gagal mengupload gambar.";
            exit();
        }
    } else {

        $sql = "UPDATE tb_berita SET judul = '$judul', isi = '$isi', tanggal_pembuatan = '$tanggal_pembuatan' WHERE id = $berita_id AND user_id = $user_id";

        if ($koneksi->query($sql) === TRUE) {
            echo "Berita berhasil diupdate.";
            // Redirect setelah berhasil diupdate
            header("Location: akun.php");
            exit();
        } else {
            echo "Gagal mengupdate berita: " . $koneksi->error;
        }
    }
}
?>
