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
            <a href="../HalamanAwal/index.php">GNews</a>
        </div>

         
</nav>



<div class="max-w-3xl mx-auto p-4 mt-16 ml-16">
    <h2 class="text-2xl font-bold mb-4"><?= htmlspecialchars($row['judul']) ?></h2>
    <p class="text-xs text-gray-600 mb-4">Tanggal: <?= htmlspecialchars($row['tanggal_pembuatan']) ?> WIB</p>
    <p class="mb-4">
        <img src='<?= htmlspecialchars($row['gambar']) ?>' width='400' class="w-full max-w-xs mx-auto ml-1">
    </p>
    <p class="mb-4 whitespace-pre-line"><?= nl2br(htmlspecialchars($row['isi'])) ?></p>
    
</div>
</body>
</html>
