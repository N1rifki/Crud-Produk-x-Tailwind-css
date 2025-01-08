<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Produk</title>
    <!-- Link Tailwind CSS CDN -->
       <!-- font -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
       <!-- box icons -->
       <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    *{
        font-family: 'Audiowide', cursive;
    }
    @keyframes color-change {
            0% { background-color: #ff0000; }
            6.66% { background-color: #ff6600; }
            13.33% { background-color: #ffcc00; }
            20% { background-color: #66ff00; }
            26.66% { background-color: #00ff66; }
            33.33% { background-color: #00cccc; }
            40% { background-color: #0066cc; }
            46.66% { background-color: #6600cc; }
            53.33% { background-color: #cc00cc; }
            60% { background-color: #cc0066; }
            66.66% { background-color: #cc3300; }
            73.33% { background-color: #ff0033; }
            80% { background-color: #ff66cc; }
            86.66% { background-color: #6633ff; }
            93.33% { background-color: #33ccff; }
            100% { background-color: #00ff99; }
        }

        .color-changing {
            animation: color-change 35s infinite;
        }
</style>
<body class="rounded-lg color-changing">

    <div class="container mx-auto py-10 ">
        <!-- Judul Halaman -->
        <h1 class="text-4xl font-bold text-center text-gradient bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-clip-text text-transparent">
            Tambah Produk Baru
        </h1>
        <!-- Form Input Produk -->
        <div class="mt-10 max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md ">
            <form method="POST" action="input_produk.php">
                <div class="mb-4">
                    <label for="nama_produk" class="block text-gray-700">Nama Produk</label>
                    <input type="text" id="nama_produk" name="nama_produk" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="mb-4">
                    <label for="kategori" class="block text-gray-700">Kategori</label>
                    <input type="text" id="kategori" name="kategori" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="mb-4">
                    <label for="harga" class="block text-gray-700">Harga</label>
                    <input type="number" id="harga" name="harga" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="mb-4">
                    <label for="stok" class="block text-gray-700">Stok</label>
                    <input type="number" id="stok" name="stok" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="mb-4 flex justify-center space-x-4">
                    <button type="submit" name="submit" class="bg-green-500 text-3xl hover:bg-green-300 hover:scale-110 text-white px-6 py-2 rounded-lg transition duration-300 w-full sm:w-auto">
                    <i class='bx bx-plus'></i>
                    </button>
                    <a href="index.php" class="bg-rose-600 hover:bg-gray-600 hover:scale-110 text-white text-3xl px-6 py-2 rounded-lg shadow-md transition duration-300 w-full sm:w-auto text-center"> 
                    <i class='bx bx-arrow-back'></i>
                    </a>
                </div>
            </form>
        </div>

        <?php
        // Cek jika form disubmit
        if (isset($_POST['submit'])) {
            // Ambil data dari form
            $nama_produk = $_POST['nama_produk'];
            $kategori = $_POST['kategori'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            // Koneksi ke database
            include 'koneksi.php';

            // Query untuk memasukkan data produk ke database
            $query = "INSERT INTO produk (nama_produk, kategori, harga, stok) VALUES ('$nama_produk', '$kategori', '$harga', '$stok')";

            // Eksekusi query
            if (mysqli_query($conn, $query)) {
                echo "<div class='mt-4 text-green-500 text-center'>Produk berhasil ditambahkan!</div>";
            } else {
                echo "<div class='mt-4 text-red-500 text-center'>Gagal menambahkan produk: " . mysqli_error($conn) . "</div>";
            }

            // Menutup koneksi
            mysqli_close($conn);
        }
        ?>

    </div>

</body>
</html>
