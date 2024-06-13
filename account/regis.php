<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Poppins', sans-serif;">

    <nav class="bg-red-700 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white font-bold text-xl">
            <a href="../HalamanAwal/index.php">GNews</a>
        </div>
    </div>
</nav>

    
<div class="flex justify-center items-center h-screen bg-gray-100">
    <div class="w-full md:w-3/4 lg:w-2/4 xl:w-2/4 p-6 rounded-lg shadow-lg bg-white" style="width: 400px;">
        <form action="./auten.php" method="post" class="flex flex-col h-full">
            <h1 class="text-xl md:text-2xl font-bold mb-4 text-center">Daftar Akun</h1>
            
            <div class="flex flex-col mb-4">
                <label for="username" class="text-gray-900 mb-1">Masukkan Nama</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Nama" required
                    class="px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-600">
            </div>

            <div class="flex flex-col mb-4">
                <label for="email" class="text-gray-900 mb-1">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan Email" required
                    class="px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-600">
            </div>

            <div class="flex flex-col mb-4">
                <label for="nomor" class="text-gray-900 mb-1">Nomor</label>
                <input type="text" id="nomor" name="nomor" placeholder="Masukkan Nomor" required
                    class="px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-600">
            </div>

            <div class="flex flex-col mb-4">
                <label for="password" class="text-gray-900 mb-1">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password" required
                    class="px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-600">
            </div>

            <div class="flex justify-between items-center">
                <a href="log.php" class="text-blue-600 hover:underline">Sudah Punya Akun? Login</a>
            </div>

            <button type="submit" name="action" value="regis"
                class="mt-auto bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md self-end">
                Register
            </button>
        </form>
    </div>
</div>


</body>
</html>
