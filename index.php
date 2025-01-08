<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <!-- font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Link Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Link Font Awesome CDN (untuk ikon) -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- jQuery (untuk AJAX) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- SweetAlert2 CDN (untuk konfirmasi) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    *{
        font-family: "Audiowide", sans-serif;;
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

    <div class="container mx-auto py-10 sm">
        <!-- Judul Halaman -->
        <h1 class="text-4xl font-bold text-center text-gradient bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-clip-text text-transparent">
     Daftar Produk
        </h1>

        <!-- Tombol Input Produk -->
        <div class="mt-6  flex justify-end gap-10">
            <a href="input_produk.php" class="bg-blue-500 hover:scale-110 transition duration-300 text-white px-6 py-2 rounded-lg shadow-md flex items-end ">
            <i class='bx bx-plus text-4xl'></i>
            </a>

            <a href="logout.php" class="bg-rose-600 hover:bg-rose-500 hover:scale-110 transition duration-300 text-white px-6 py-2 rounded-lg ">
              <i class='bx bx-log-out text-4xl'></i>
                </a>
        </div>
       
        <!-- Form Pencarian -->
        <div class="mt-8 flex justify-center w-1/2 sm justify-center p-2">
            <form method="GET" action="index.php" class="flex w-full hover hover:scale-110  transition duration-300">
                <input
                    type="text"
                    name="search"
                    placeholder="Cari berdasarkan Nama Produk atau Kategori..."
                    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                    class="flex-grow px-4 py-2 border rounded-l-lg focus:outline-none focus:ring focus:border-blue-300"
                />
                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-r-lg transition duration-300"
                >
                <i class='bx bx-search-alt text-3xl' ></i>
                </button>
            </form>
        </div>

        <!-- Tabel Data -->
        <div class="mt-10 sm:text-l p-5 justify-center">
            <table class="w-full table-auto bg-white rounded-lg shadow-md overflow-hidden">
                <thead class="bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left">ID</th>
                        <th class="px-6 py-4 text-left">Nama Produk</th>
                        <th class="px-6 py-4 text-left">Kategori</th>
                        <th class="px-6 py-4 text-left">Harga</th>
                        <th class="px-6 py-4 text-left">Stok</th>
                        <th class="px-6 py-4 text-left">Tanggal Input</th>
                        <th class="px-6 py-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include koneksi ke database
                    include 'koneksi.php';

                    // Variabel pencarian
                    $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

                    // Query untuk mengambil data dari tabel produk
                    $query = "SELECT * FROM produk";
                    if (!empty($search)) {
                        $query .= " WHERE nama_produk LIKE '%$search%' OR kategori LIKE '%$search%'";
                    }

                    $result = mysqli_query($conn, $query);

                    // Cek apakah ada data
                    if (mysqli_num_rows($result) > 0) {
                        // Loop data produk
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr class='hover:bg-gradient-to-r hover:from-blue-100 hover:to-pink-100 transition duration-300'>";
                            echo "<td class='px-6 py-4 border-b'>" . $row['id_produk'] . "</td>";
                            echo "<td class='px-6 py-4 border-b'>" . $row['nama_produk'] . "</td>";
                            echo "<td class='px-6 py-4 border-b'>" . $row['kategori'] . "</td>";
                            echo "<td class='px-6 py-4 border-b'>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>";
                            echo "<td class='px-6 py-4 border-b'>" . $row['stok'] . "</td>";
                            echo "<td class='px-6 py-4 border-b'>" . $row['tanggal_input'] . "</td>";
                            echo "<td class='px-6 py-4 border-b'>
                                    <button class='bg-green-500 hover:scale-110 m-3 transition duration-300 text-white px-4 py-2 rounded-lg' onclick='editProduct(" . $row['id_produk'] . ")'>
                                        <i class='bx bx-edit'></i> Edit
                                    </button>
                                    <button class='bg-rose-600 hover:scale-110 m-3 transition duration-300 text-white px-4 py-2 rounded-lg mt-2' onclick='deleteProduct(" . $row['id_produk'] . ")'>
                                       <i class='bx bx-trash'></i> Hapus
                                    </button>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center py-6'>Tidak ada data yang sesuai.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Edit Produk -->
    <div id="editModal" class="fixed inset-0 bg-gray-500 bg-opacity-50 hidden flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-md w-96">
            <h2 class="text-2xl font-bold mb-4">Edit Produk</h2>
            <form id="editForm" method="POST">
                <input type="hidden" id="editId" name="editId">
                <div class="mb-4">
                    <label for="editNamaProduk" class="block text-gray-700">Nama Produk</label>
                    <input type="text" id="editNamaProduk" name="nama_produk" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="mb-4">
                    <label for="editKategori" class="block text-gray-700">Kategori</label>
                    <input type="text" id="editKategori" name="kategori" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="mb-4">
                    <label for="editHarga" class="block text-gray-700">Harga</label>
                    <input type="number" id="editHarga" name="harga" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="mb-4">
                    <label for="editStok" class="block text-gray-700">Stok</label>
                    <input type="number" id="editStok" name="stok" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="mb-4 flex justify-around">
                    <button type="button" onclick="closeModal()" class="bg-rose-600 hover:bg-gray-600 hover:scale-110 m-3 transition duration-300 text-white px-4 py-2 rounded-lg">
                    <i class='bx bx-window-close text-3xl'></i>
                    </button>
                    <button type="submit" class="bg-green-500 hover:bg-blue-600 hover:scale-110 m-3 transition duration-300 text-white px-6 py-2 rounded-lg">
                    <i class='bx bx-save text-3xl' ></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function editProduct(id) {
            // Fetch data produk berdasarkan ID
            $.ajax({
                url: 'get_produk.php',
                method: 'GET',
                data: { id_produk: id },
                success: function(data) {
                    const product = JSON.parse(data);
                    // Isi data produk ke form modal
                    $('#editId').val(product.id_produk);
                    $('#editNamaProduk').val(product.nama_produk);
                    $('#editKategori').val(product.kategori);
                    $('#editHarga').val(product.harga);
                    $('#editStok').val(product.stok);
                    // Tampilkan modal
                    $('#editModal').removeClass('hidden');
                }
            });
        }

        function closeModal() {
            $('#editModal').addClass('hidden');
        }

        function deleteProduct(id) {
            // Konfirmasi sebelum hapus
            Swal.fire({
                title: 'Anda yakin ingin menghapus produk ini?',
                text: "Data ini akan dihapus secara permanen.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim AJAX untuk hapus data
                    $.ajax({
                        url: 'hapus_produk.php',
                        method: 'POST',
                        data: { id_produk: id },
                        success: function(response) {
                            Swal.fire(
                                'Terhapus!',
                                'Produk telah dihapus.',
                                'success'
                            );
                            location.reload();  // Reload halaman untuk update tabel
                        }
                    });
                }
            });
        }

        $('#editForm').submit(function(e) {
            e.preventDefault();
            // Ambil data dari form
            const formData = $(this).serialize();

            // Kirim data menggunakan AJAX
            $.ajax({
                url: 'update_produk.php',
                method: 'POST',
                data: formData,
                success: function(response) {
                    alert('Produk berhasil diperbarui!');
                    // Tutup modal
                    closeModal();
                    // Perbarui tabel tanpa reload halaman
                    location.reload();
                }
            });
        });
    </script>
</body>
</html>
