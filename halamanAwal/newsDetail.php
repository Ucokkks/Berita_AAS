<?php
include "../Controller/controller.php";

if (isset($_GET['id'])) {
    $news_id = $_GET['id'];

    $stmt = $koneksi->prepare("SELECT * FROM tb_berita WHERE id = ?");
    $stmt->bind_param("i", $news_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Berita tidak ditemukan.";
        exit();
    }
    $stmt->close();
} else {
    echo "ID berita tidak diberikan.";
    exit();
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($row['judul']) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body style="font-family: 'Poppins', sans-serif;">

<nav class="bg-red-700 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white font-bold text-xl">
            <a href="../HalamanAkun/account.php">GNews</a>
        </div>
        <div>
            <a href="../HalamanAwal/index.php" class="text-gray-300 hover:text-white px-3 py-2 rounded-md">Home</a>
        </div>
    </div>
</nav>



    <h2><?= htmlspecialchars($row['judul']) ?></h2>
    <p><img src='<?= htmlspecialchars($row['gambar']) ?>' width='300'></p>
    <p><?= nl2br(htmlspecialchars($row['isi'])) ?></p>
    <p>Tanggal: <?= htmlspecialchars($row['tanggal_pembuatan']) ?> WIB</p>
    <a href='index.php'>Kembali ke Beranda</a>
</body>
</html>
