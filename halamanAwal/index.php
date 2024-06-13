<?php
session_start();
include "../Controller/controller.php";

// Ambil satu berita terpopuler secara acak untuk ditampilkan
$sql_popular = "SELECT id, judul, gambar, tanggal_pembuatan, isi FROM tb_berita ORDER BY RAND() LIMIT 1";
$stmt_popular = $koneksi->prepare($sql_popular);
$stmt_popular->execute();
$result_popular = $stmt_popular->get_result();

// Ambil semua berita untuk ditampilkan
$sql_all = "SELECT id, judul, gambar, tanggal_pembuatan FROM tb_berita";
$stmt_all = $koneksi->prepare($sql_all);
$stmt_all->execute();
$result_all = $stmt_all->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GNews</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-white text-gray-900" style="font-family: 'Poppins', sans-serif;">

<nav class="bg-red-700 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white font-bold text-xl">
            <a href="../HalamanAkun/account.php">GNews</a>
        </div>
        <div>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="../HalamanAkun/akun.php" class="text-gray-300 hover:text-white px-3">Dashboard</a>
            <?php else: ?>
                <a href="../account/log.php" class="text-gray-300 hover:text-white px-3">Login</a>
                <a href="../account/regis.php" class="text-gray-300 hover:text-white px-3">Register</a>
            <?php endif ?>
        </div>
    </div>
</nav>

<div class="container mt-8 mx-auto p-6">
    <!-- Popular News Section -->
    <h2 class="text-2xl font-bold ml-56">Berita Terpopuler</h2>
    <div class="h-1 w-14 bg-red-600 mb-4 ml-56"></div>
    <?php if ($result_popular->num_rows > 0): ?>
        <?php $row_popular = $result_popular->fetch_assoc(); ?>
        <div class="bg-white border-2 border-black p-3 mb-3 max-w-screen-lg mx-auto">
            <div class="grid grid-cols-2 gap-4">
                <div class="pl-4 pt-6">
                    <h3 class="text-xl font-bold mb-1"><a href='newsDetail.php?id=<?= $row_popular['id'] ?>' style="color:#333333" class="hover:underline"><?= htmlspecialchars($row_popular['judul']) ?></a></h3>
                    <p class="text-xs  pb-1" style="color: #CBCBCB">Tanggal: <?= htmlspecialchars($row_popular['tanggal_pembuatan']) ?> WIB</p>
                    <p class="text-sm pt-1 mb-1" style="color: #333333"><?= htmlspecialchars($row_popular['isi']) ?></p>
                </div>
                <div class="text-right">
                    <img src='<?= htmlspecialchars($row_popular['gambar']) ?>' width='400' class="mt-2">
                </div>
            </div>
        </div>
    <?php else: ?>
        <p>No popular news available.</p>
    <?php endif; ?>
</div>

<div class="container mx-auto p-6 pb-4">
    <h2 class="text-2xl font-bold ml-56">Berita Terbaru</h2>
    <div class="h-1 w-14 bg-red-600 mb-4 ml-56"></div>

    <div class="grid grid-cols-3 gap-4 ml-56">
        <?php if ($result_all->num_rows > 0): ?>
            <?php while ($row = $result_all->fetch_assoc()): ?>
                <div class="mb-4">
                    <img src='<?= htmlspecialchars($row['gambar']) ?>' width='200' class="mt-2">
                    <h2 class="text-lg font-semibold mt-2"><a href='newsDetail.php?id=<?= $row['id'] ?>' class="text-gray-800 hover:underline"><?= htmlspecialchars($row['judul']) ?></a></h2>
                    <p class="text-xs  pb-1" style="color: #CBCBCB">Tanggal: <?= htmlspecialchars($row['tanggal_pembuatan']) ?> WIB</p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No news available.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
