<?php
session_start();
include 'koneksi.php';

// Cek jika sudah login, langsung ke index.php
if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        // Verifikasi password dengan hash
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header('Location: index.php');
            exit;
        } else {
            $error = 'Password salah!';
        }
    } else {
        $error = 'Username tidak ditemukan!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CDN Box Icons for social media icons -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
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

    /* Styling responsif */
    @media (max-width: 768px) {
        .login-container {
            width: 90%;
        }

        .social-icons {
            gap: 4px;
        }

        .social-icons i {
            font-size: 1.5rem;
        }
    }

    /* Styling untuk foto profil */
    .profile-img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .profile-img:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }
</style>
<body class="rounded-lg color-changing flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md login-container">
        <div class="flex justify-center mb-4">
            <!-- Foto Profil dengan bayangan dan efek hover -->
            <img src="https://via.placeholder.com/120" alt="Profile" class="profile-img border-4 border-gray-300">
        </div>
        <h1 class="text-2xl font-bold text-center text-gray-700">Login</h1>
        <form action="login.php" method="POST" class="mt-4">
            <?php if ($error): ?>
                <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Username</label>
                <input type="text" name="username" id="username" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                <div class="mt-2">
                    <input type="checkbox" id="showPassword" class="mr-2">
                    <label for="showPassword" class="text-sm text-gray-600">Lihat Password</label>
                </div>
            </div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 hover:scale-110 text-white px-4 py-2 rounded-lg transition duration-300">
                Login
            </button>
        </form>
        <p class="text-gray-600 mt-4 text-center">
            Belum punya akun? <a href="register.php" class="text-blue-500 hover:underline">Daftar</a>
        </p>

        <!-- Ikon Sosial Media -->
        <div class="flex justify-center items-center mt-4 space-x-6 social-icons">
            <a href="https://facebook.com" class="text-blue-600 text-2xl">
                <i class='bx bxl-facebook'></i>
            </a>
            <a href="https://instagram.com" class="text-pink-500 text-2xl">
                <i class='bx bxl-instagram'></i>
            </a>
            <a href="https://youtube.com" class="text-red-600 text-2xl">
                <i class='bx bxl-youtube'></i>
            </a>
            <a href="https://wa.me" class="text-green-500 text-2xl">
                <i class='bx bxl-whatsapp'></i>
            </a>
        </div>
    </div>

    <!-- Script untuk fitur Lihat Password -->
    <script>
        document.getElementById('showPassword').addEventListener('change', function () {
            const passwordField = document.getElementById('password');
            if (this.checked) {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>
</body>
</html>
