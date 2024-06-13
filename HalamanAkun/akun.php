<?php
include "../Controller/controller.php";
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: log.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tb_berita WHERE user_id = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900 font-poppins">

<nav class="bg-red-700 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white font-bold text-xl">
            <a href="../HalamanAwal/index.php">GNews</a>
        </div>
        <div>
            <?php if (isset($_SESSION['username'])): ?>
                <form action="../account/auten.php" method="post" style="display: inline-block;">
                    <input type="hidden" name="action" value="logout">
                    <button type="submit" class="text-gray-300 hover:text-white px-3">Logout</button>
                </form>
            <?php else: ?>
                <a href="../account/log.php" class="text-gray-300 hover:text-white px-3">Login</a>
                <a href="../account/regis.php" class="text-gray-300 hover:text-white px-3">Register</a>
            <?php endif ?>
        </div>
    </div>
</nav>

<p class="text-xl mb-4 text-center mt-8">Ingin membuat berita:</p>

<div class="flex justify-center">
    <div class="p-6 bg-white rounded-lg shadow-md w-full max-w-md">
        <a href="addNews.php" class="block w-full text-center py-2 px-4 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600 transition duration-300 ease-in-out">
            Buat Berita
        </a>
    </div>
</div>

<p class="text-xl mb-4 text-center mt-8">Edit berita:</p>
<div class="flex justify-center mt-6">
    <div class="p-6 bg-white rounded-lg shadow-md w-full max-w-md">
        <table class="min-w-full border-collapse block md:table">
            <thead class="block md:table-header-group">
                <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative">
                    <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Judul</th>
                    <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Aksi</th>
                </tr>
            </thead>
            <tbody class="block md:table-row-group">
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><?= htmlspecialchars($row['judul']) ?></td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <a href="editBerita.php?id=<?= $row['id'] ?>" class="bg-blue-500 text-white py-1 px-2 rounded hover:bg-blue-600">Edit</a>
                        <button class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600" onclick="konfirmasiHapus(<?= $row['id'] ?>)">Hapus</button>
                    </td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function konfirmasiHapus(id) {
        if (confirm("Yakin ingin menghapus berita ini?")) {
            location.replace("hapus.php?delete_id=" + id);
        }
    }
</script>

</body>
</html>
