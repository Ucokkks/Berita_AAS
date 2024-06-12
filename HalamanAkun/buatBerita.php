<?php
include "../Controller/controller.php";
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: log.php');
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] === 'buat') {
    $judul = $koneksi->real_escape_string($_POST['judul_berita']);
    $isi = $koneksi->real_escape_string($_POST['isi_berita']);
    $tanggal_pembuatan = date('Y-m-d H:i:s');

    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';

    if (isset($_FILES['gambar'])) {
        $gambar_name = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $target_dir = "../Gambar/";
        $target_file = $target_dir . basename($gambar_name);

        if ($_FILES['gambar']['error'] == 0) {
            if (move_uploaded_file($gambar_tmp, $target_file)) {
                $gambar_path = $target_file;

                $stmt = $koneksi->prepare("INSERT INTO tb_berita (judul, gambar, isi, tanggal_pembuatan, user_id) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssi", $judul, $gambar_path, $isi, $tanggal_pembuatan, $user_id);

                if ($stmt->execute()) {
                    header('Location: ../HalamanAwal/index.php');
                    exit();
                } else {
                    echo "Gagal menambah berita: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Gagal mengupload gambar.";
            }
        } else {
            echo "Error saat mengunggah gambar: " . $_FILES['gambar']['error'];
        }
    } else {
        echo "Tidak ada gambar yang diunggah atau terjadi kesalahan saat mengunggah gambar.";
    }
}

$sql = "SELECT * FROM tb_berita WHERE user_id = $user_id";
$result = $koneksi->query($sql);

$koneksi->close();
?>
