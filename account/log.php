<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
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

    <!-- Main Content -->
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-md p-8 rounded-lg shadow-lg bg-white">
            <form action="auten.php" method="post" class="flex flex-col space-y-6">
                <h1 class="text-2xl font-bold text-center">Masuk</h1>
                
                <div class="flex flex-col">
                    <label for="username" class="text-gray-900 mb-2">Masukkan Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan Nama" required
                           class="px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-600">
                </div>

                <div class="flex flex-col">
                    <label for="password" class="text-gray-900 mb-2">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" required
                           class="px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-600">
                </div>

                <div class="flex justify-between items-center">
                    <a href="regis.php" class="text-blue-600 hover:underline">Belum Punya Akun? Register</a>
                </div>

                <div class="flex justify-end">
                    <button type="submit" name="action" value="login"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-md shadow-md">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
