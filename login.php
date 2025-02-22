<?php
require_once 'koneksi.php';

// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: console.php');
    exit; // Make sure to exit after redirection
}

if (isset($_POST['masuk'])) {
    $username = $_POST['username'];
    $verifycode = $_POST['password'];

    // Ambil data pengguna berdasarkan username
    $sql = "SELECT * FROM playerucp WHERE ucp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verifikasi verifycode
        if ($row['verifycode'] == $verifycode) {
            // Login sukses
            $_SESSION['logged_in'] = true;
            $_SESSION['userid'] = $row['ID'];
            $_SESSION['ucp'] = $row['ucp'];
            header('Location: console.php');
            exit; // Make sure to exit after redirection
        } else {
            echo "Invalid verifycode.";
        }
    } else {
        echo "User not found.";
    }
}
?>


<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   One Pride Roleplay
  </title>
  <link rel="icon" type="image/x-icon" href="assets/oprp.png">
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
            background-image: url('assets/p.jpg');
            background-size: cover;
            background-position: center;
            color: white;
        }
        .navbar {
            background: rgba(0, 0, 0, 0.7);
        }
        .navbar a {
            color: white;
        }
        .card {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 20px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s;
            border-top: 4px solid red;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            border-radius: 20px;
        }
        .btn {
            border: 2px solid #3b82f6;
            color: #3b82f6;
            padding: 8px 16px;
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn:hover {
            background-color: #3b82f6;
            color: white;
        }
        .btn-disabled {
            border: 2px solid #6b7280;
            color: #6b7280;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: not-allowed;
        }
        .mobile-menu {
            display: none;
        }
        @media (max-width: 768px) {
            .mobile-menu {
                display: block;
                background: rgba(0, 0, 0, 0.7);
            }
            .desktop-menu {
                display: none;
            }
        }
  </style>
 </head>
 <body class="bg-gray-900">
  <nav class="navbar flex justify-between items-center p-4">
   <div class="flex items-center">
    <a href="index.php" ><img alt="Logo" class="mr-3" height="50" src="assets/oprp.png" width="50"/></a>
    <span class="text-2xl font-bold">
     ONE PRIDE
    </span>
    <span class="text-sm ml-2">
     ROLEPLAY
    </span>
   </div>
   <div class="hidden md:flex space-x-6 desktop-menu">
    <div class="relative group">
     <a class="hover:underline" href="#">
      Server
     </a>
     <div class="absolute hidden group-hover:block bg-gray-800 text-white p-2 rounded shadow-lg">
      <a class="block px-4 py-2" href="#">
       Status
      </a>
      <a class="block px-4 py-2" href="#">
       Player
      </a>
     </div>
    </div>
    <div class="relative group">
     <a class="hover:underline" href="#">
      Bantuan
     </a>
     <div class="absolute hidden group-hover:block bg-gray-800 text-white p-2 rounded shadow-lg">
      <a class="block px-4 py-2" href="#">
       Report
      </a>
      <a class="block px-4 py-2" href="#">
       Bug
      </a>
     </div>
    </div>
    <a class="hover:underline" href="#">
     Rules
    </a>
    <a class="hover:underline" href="#">
     Donate
    </a>
    <div class="relative group">
     <a class="hover:underline" href="#">
      Akun
     </a>
     <div class="absolute hidden group-hover:block bg-gray-800 text-white p-2 rounded shadow-lg">
      <a class="block px-4 py-2" href="#">
       Statistik
      </a>
      <a class="block px-4 py-2" href="console.php">
       Panel Akun
      </a>
     </div>
    </div>
   </div>
   <button class="btn desktop-menu">
    Login
   </button>
   <div class="mobile-menu">
    <button class="text-white" id="mobile-menu-button">
     <i class="fas fa-bars fa-2x">
     </i>
    </button>
   </div>
  </nav>
  <div class="hidden mobile-menu text-white p-4" id="mobile-menu">
    <a class="block px-4 py-2 hover:bg-gray-700" href="#">
     Server
    </a>
    <a class="block px-4 py-2 hover:bg-gray-700" href="#">
     Bantuan
    </a>
    <a class="block px-4 py-2 hover:bg-gray-700" href="#">
     Rules
    </a>
    <a class="block px-4 py-2 hover:bg-gray-700" href="#">
     Donate
    </a>
    <a class="block px-4 py-2 hover:bg-gray-700" href="console.php">
     Akun
    </a>
    <button class="btn mt-4 w-full">
     Login
    </button>
   </div>
   <div class="flex items-center justify-center min-h-screen">
    <div class="bg-gray-800 bg-opacity-90 p-8 rounded-lg shadow-lg w-96">
     <h2 class="text-white text-2xl font-bold text-center mb-4">
      Login
     </h2>
     <p class="text-gray-400 text-center mb-6">
      Belum punya akun?
      <a class="text-blue-500" href="https://discord.gg/onepride">
       Buat akun
      </a>
     </p>
     <form method="post">
        <div class="mb-4">
            <label class="block text-gray-400 mb-2" for="username">
                Username
            </label>
            <input class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500" id="username" name="username" placeholder="Username" type="text" required/>
        </div>
        <div class="mb-4 relative">
            <label class="block text-gray-400 mb-2" for="password">
                Pin Akun
            </label>
            <input class="w-full p-2 rounded bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500" id="password" name="password" placeholder="Pin Akun" type="password" required/>
            <i class="fas fa-eye absolute right-3 top-10 text-gray-400 cursor-pointer" id="toggle-password"></i>
        </div>
        <div class="mb-4 text-right">
        <div class="mb-4 text-right">
            <button id="forgotPinButton" class="text-blue-500">
                Lupa pin akun?
            </button>
        </div>
        </div>
        <button class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600" name="masuk">
            Masuk
        </button>
     </form>
    </div>
   </div>
   <!-- Modal for recovering PIN -->
    <div id="pinModal" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-80">
            <h3 class="text-white text-lg font-bold mb-4">Informasi Pemulihan PIN</h3>
            <p class="text-gray-400 mb-4">
                Pin untuk memasuki website adalah kode verifikasi yang pertama kali dikirim oleh bot discord One Pride. Silahkan cek. Jika tidak ada, bisa gunakan command !reucp di server Discord One Pride bagian registration.
            </p>
            <button id="closeModal" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                Tutup
            </button>
        </div>
    </div>
  <footer class="bg-gray-800 text-white mt-12 p-6">
   <div class="container mx-auto flex flex-wrap justify-between items-center">
    <div class="w-full md:w-1/3 text-center md:text-left mb-4 md:mb-0">
     <h2 class="text-xl font-bold">
      ONE PRIDE ROLEPLAY
     </h2>
     <p class="text-sm">
      © 2024 All rights reserved.
     </p>
    </div>
    <div class="w-full md:w-1/3 text-center mb-4 md:mb-0">
     <a class="text-white mx-2 hover:text-gray-400" href="#">
      <i class="fab fa-facebook fa-2x">
      </i>
     </a>
     <a class="text-white mx-2 hover:text-gray-400" href="https://discord.gg/onepride">
      <i class="fab fa-discord fa-2x">
      </i>
     </a>
     <a class="text-white mx-2 hover:text-gray-400" href="#">
      <i class="fab fa-instagram fa-2x">
      </i>
     </a>
    </div>
    <div class="w-full md:w-1/3 text-center md:text-right">
     <a class="text-white mx-2 hover:text-gray-400" href="#">
      Privacy Policy
     </a>
     <a class="text-white mx-2 hover:text-gray-400" href="#">
      Terms of Service
     </a>
    </div>
   </div>
  </footer>
  <script>
    document.getElementById('forgotPinButton').addEventListener('click', function() {
        document.getElementById('pinModal').classList.remove('hidden');
    });

    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('pinModal').classList.add('hidden');
    });
    document.getElementById('toggle-password').addEventListener('click', function() {
        var passwordInput = document.getElementById('password');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
   document.getElementById('mobile-menu-button').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
  </script>
 </body>
</html>