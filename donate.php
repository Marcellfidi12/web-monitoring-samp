<?php
session_start();

// Sample donation data
$donations = [
    [
        'id' => 1,
        'nama' => 'Donasi Bronze',
        'keuntungan' => 'Akses ke fitur dasar dan badge spesial',
        'harga' => 50.00
    ],
    [
        'id' => 2,
        'nama' => 'Donasi Silver',
        'keuntungan' => 'Akses ke fitur menengah dan badge spesial',
        'harga' => 100.00
    ],
    [
        'id' => 3,
        'nama' => 'Donasi Gold',
        'keuntungan' => 'Akses ke semua fitur dan badge spesial',
        'harga' => 200.00
    ],
    [
        'id' => 4,
        'nama' => 'Donasi Platinum',
        'keuntungan' => 'Akses eksklusif dan semua fitur',
        'harga' => 500.00
    ],
    [
        'id' => 5,
        'nama' => 'Donasi Platinum',
        'keuntungan' => 'Akses eksklusif dan semua fitur',
        'harga' => 500.00
    ],
    [
        'id' => 6,
        'nama' => 'Donasi Platinum',
        'keuntungan' => 'Akses eksklusif dan semua fitur',
        'harga' => 500.00
    ],
    [
        'id' => 7,
        'nama' => 'Donasi Platinum',
        'keuntungan' => 'Akses eksklusif dan semua fitur',
        'harga' => 500.00
    ],
    [
        'id' => 8,
        'nama' => 'Donasi Platinum',
        'keuntungan' => 'Akses eksklusif dan semua fitur',
        'harga' => 500.00
    ]
    ,
    [
        'id' => 9,
        'nama' => 'Donasi Platinum',
        'keuntungan' => 'Akses eksklusif dan semua fitur',
        'harga' => 500.00
    ],
    [
        'id' => 10,
        'nama' => 'Donasi Platinum',
        'keuntungan' => 'Akses eksklusif dan semua fitur',
        'harga' => 500.00
    ]
];
?>

<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>One Pride Roleplay</title>
    <link rel="icon" type="image/x-icon" href="assets/oprp.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
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
        main {
            margin: 20px; /* Added margin for the main content */
        }
    </style>
</head>
<body class="bg-gray-900">
<nav class="navbar flex justify-between items-center p-4">
    <div class="flex items-center">
        <a href="index.php" ><img alt="Logo" class="mr-3" height="50" src="assets/oprp.png" width="50"/></a>
        <span class="text-2xl font-bold">ONE PRIDE</span>
        <span class="text-sm ml-2">ROLEPLAY</span>
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
    <a class="hover:underline" href="report.php">
     Report/Bug
    </a>
    <a class="hover:underline" href="#">
     Rules
    </a>
    <a class="hover:underline" href="donate.php">
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
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
        <a href="logout.php"><button class="btn desktop-menu">Logout</button></a>
    <?php else: ?>
        <a href="login.php"><button class="btn desktop-menu">Login</button></a>
    <?php endif; ?>
    <div class="mobile-menu">
        <button class="text-white" id="mobile-menu-button">
            <i class="fas fa-bars fa-2x"></i>
        </button>
    </div>
</nav>
<div class="hidden mobile-menu text-white p-4" id="mobile-menu">
    <a class="block px-4 py-2 hover:bg-gray-700" href="#">
     Server
    </a>
    <a class="block px-4 py-2 hover:bg-gray-700" href="report.php">
     Report/Bug
    </a>
    <a class="block px-4 py-2 hover:bg-gray-700" href="#">
     Rules
    </a>
    <a class="block px-4 py-2 hover:bg-gray-700" href="donate.php">
     Donate
    </a>
    <a class="block px-4 py-2 hover:bg-gray-700" href="console.php">
     Akun
    </a>
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
    <a href="logout.php"><button class="btn mt-4 w-full">Logout</button></a>
    <?php else: ?>
    <a href="login.php"><button class="btn mt-4 w-full">Login</button></a>
    <?php endif; ?>
   </div>
<main class="flex flex-col items-center text-center text-white mt-20 px-4 md:px-0">
    <h1 class="text-4xl font-bold mb-4">Donasi</h1>
    <p class="mb-8">Dukung server kami dengan melakukan donasi. Berikut adalah pilihan donasi yang tersedia:</p>

    <table class="min-w-full bg-gray-800 text-white">
        <thead>
            <tr>
                <th class="py-2 px-4 text-center">ID</th>
                <th class="py-2 px-4 text-center">Nama Donasi</th>
                <th class="py-2 px-4 text-center">Keuntungan</th>
                <th class="py-2 px-4 text-center">Harga</th>
                <!-- <th class="py-2 px-4 text-center">Order</th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($donations as $donation): ?>
                <tr>
                    <td class="py-2 px-4 border-b border-gray-700 text-center"><?php echo $donation['id']; ?></td>
                    <td class="py-2 px-4 border-b border-gray-700 text-center"><?php echo $donation['nama']; ?></td>
                    <td class="py-2 px-4 border-b border-gray-700 text-center">
                        <i class="fas fa-eye cursor-pointer" onclick="showBenefits('<?php echo addslashes($donation['keuntungan']); ?>')"></i>
                    </td>
                    <td class="py-2 px-4 border-b border-gray-700 text-center"><?php echo number_format($donation['harga'], 2); ?></td>
                    <!-- <td class="py-2 px-4 border-b border-gray-700 text-center">
                        <a href="order.php?id=<?php echo $donation['id']; ?>" class="text-blue-400 hover:underline">Order</a>
                    </td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div id="benefit-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 hidden">
        <div class="bg-gray-800 p-6 rounded shadow-lg">
            <h2 class="text-xl font-bold mb-2">Keuntungan</h2>
            <p id="benefit-content" class="mb-4"></p>
            <button onclick="closeModal()" class="btn">Tutup</button>
        </div>
    </div>
</main>

<script>
    function showBenefits(benefit) {
        document.getElementById('benefit-content').innerText = benefit;
        document.getElementById('benefit-modal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('benefit-modal').classList.add('hidden');
    }
</script>

<footer class="bg-gray-800 text-white mt-12 p-6">
    <div class="container mx-auto flex flex-wrap justify-between items-center">
        <div class="w-full md:w-1/3 text-center md:text-left mb-4 md:mb-0">
            <h2 class="text-xl font-bold">ONE PRIDE ROLEPLAY</h2>
            <p class="text-sm">© 2024 All rights reserved.</p>
        </div>
        <div class="w-full md:w-1/3 text-center mb-4 md:mb-0">
            <a class="text-white mx-2 hover:text-gray-400" href="#">
                <i class="fab fa-facebook fa-2x"></i>
            </a>
            <a class="text-white mx-2 hover:text-gray-400" href="#">
                <i class="fab fa-twitter fa-2x"></i>
            </a>
            <a class="text-white mx-2 hover:text-gray-400" href="#">
                <i class="fab fa-instagram fa-2x"></i>
            </a>
        </div>
        <div class="w-full md:w-1/3 text-center md:text-right">
            <a class="text-white mx-2 hover:text-gray-400" href="#">Privacy Policy</a>
            <a class="text-white mx-2 hover:text-gray-400" href="#">Terms of Service</a>
        </div>
    </div>
</footer>
<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        var menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
</body>
</html>
