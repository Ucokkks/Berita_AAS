<?php
include "../Controller/controller.php";
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: log.php');
    exit();
}

if(!isset($_GET['delete_id']) && !is_numeric($_GET['delete_id'])) {
    $_SESSION['error_msg'] = "Parameter tidak valid";
} else {
    $user_id = $_SESSION['user_id'];
    $berita_id = $_GET['delete_id'];

    //Delete news from the database
    $sql = "DELETE FROM tb_berita WHERE id = ? AND user_id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ii", $berita_id, $user_id);

    if ($stmt->execute()) {
        echo "Berita berhasil dihapus.";
    } else {
        echo "Gagal menghapus berita: " . $stmt->error;
    }
    $stmt->close();
}

header("Location: akun.php");
exit();


?>
