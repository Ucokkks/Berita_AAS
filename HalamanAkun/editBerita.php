<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900  min-h-screen">
        <nav class="bg-red-700 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white font-bold text-xl">
                <a href="../HalamanAkun/account.php">GNews</a>
            </div>
            <div>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="../HalamanAkun/akun.php" class="text-gray-300 hover:text-white px-3">Dashboard</a>
                <?php else: ?>
                    <a href="../account/log.php" class="text-gray-300 hover:text-white px-3">Login</a>
                    <a href="../account/regis.php" class="text-gray-300 hover:text-white px-3">Register</a>
                <?php endif ?>
            </div>
        </div>
    </nav>

        <h1 class="text-xl mb-4 text-center mt-8">Edit Berita:</h1>

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

        if (isset($_GET['id'])) {
            $berita_id = $_GET['id'];
            // Ambil data berita yang akan diedit
            $sql = "SELECT * FROM tb_berita WHERE id = $berita_id AND user_id = $user_id";
            $result = $koneksi->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $judul_berita = $row['judul'];
                $isi_berita = $row['isi'];
                $gambar_berita = $row['gambar'];
            } else {
                echo "Berita tidak ditemukan atau Anda tidak memiliki akses untuk mengedit berita ini.";
                exit();
            }
        } else {
            echo "ID berita tidak ditemukan.";
            exit();
        }
        ?>

        <form method="post" action="update.php" enctype="multipart/form-data">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="berita_id" value="<?php echo $berita_id; ?>">
            <div class="mx-auto w-3/4"> <!-- Mengatur lebar 70% dari parent dan posisi tengah -->
                <div class="mb-4">
                    <label for="judul_berita" class="block text-gray-700 text-sm font-bold mb-2">Judul Berita</label>
                    <input type="text" name="judul_berita" id="judul_berita" value="<?php echo htmlspecialchars($judul_berita); ?>" placeholder="Masukkan judul berita" class="appearance-none block w-full px-3 py-2 border border-black-300 rounded-md placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="gambar" class="block text-gray-700">Gambar Berita</label>
                    <img src="<?php echo htmlspecialchars($gambar_berita); ?>" alt="Gambar Berita" width="100" class="mb-2">
                    <input type="file" name="gambar" id="gambar" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="isi_berita" class="block text-gray-700">Isi Berita</label>
                    <textarea name="isi_berita" id="isi_berita" rows="5" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"><?php echo htmlspecialchars($isi_berita); ?></textarea>
                </div>

                <div class="flex justify-end">
                    <a href="akun.php" class="bg-gray-300 text-gray-700 py-2 px-4 rounded  hover:bg-gray-400">Batal</a>
                    <button type="submit" class="bg-green-500 text-white py-2 px-4 ml-2 rounded hover:bg-green-600">Simpan Perubahan</button>
                </div>
            </div>

        </form>
</body>
</html>
