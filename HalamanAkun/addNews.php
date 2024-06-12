<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
</head>
<body>
        <nav class="bg-red-700 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white font-bold text-xl">
                <a href="../HalamanAkun/account.php">GNews</a>
            </div>
            <div>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="../HalamanAwal/index.php" class="text-gray-300 hover:text-white px-3">Home</a>
                <?php else: ?>
                    <a href="../account/log.php" class="text-gray-300 hover:text-white px-3">Login</a>
                    <a href="../account/regis.php" class="text-gray-300 hover:text-white px-3">Register</a>
                <?php endif ?>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <h1 class="text-xl mb-4 text-center">Buat Berita:</h1>

        <form method="post" action="buatBerita.php" enctype="multipart/form-data" class="mx-auto w-3/4 ">
            <div class="mb-4">
                <label for="judul_berita" class="block text-gray-700 text-sm font-bold mb-2">Judul Berita</label>
                <input type="text" name="judul_berita" id="judul_berita" placeholder="Masukkan judul berita" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="gambar" class="block text-gray-700">Upload Gambar</label>
                <input type="file" name="gambar" id="gambar" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="isi_berita" class="block text-gray-700">Isi Berita</label>
                <textarea name="isi_berita" id="isi_berita" rows="5" placeholder="Isi berita di sini" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
            </div>

            <div class="flex justify-end">
                <a href="akun.php" class="bg-gray-300 text-gray-700 py-2 px-4 rounded hover:bg-gray-400">Batal</a>
                <button type="submit" name="action" value="buat" class="bg-green-500 text-white py-2 px-4 ml-2 rounded hover:bg-green-600">Buat Berita</button>
            </div>
        </form>
    </div>
</body>
</html>
