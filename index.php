<?php
require_once 'koneksi.php';
session_start();
$jumlahWarga = mysqli_query($conn, "SELECT COUNT(*) as count FROM playerucp")->fetch_assoc()['count'];
$jumlahBanned = mysqli_query($conn, "SELECT COUNT(*) as count FROM banneds")->fetch_assoc()['count'];
$jumlahPolisi = mysqli_query($conn, "SELECT COUNT(*) as count FROM houses")->fetch_assoc()['count'];
$jumlahEMS = mysqli_query($conn, "SELECT COUNT(*) as count FROM bisnis")->fetch_assoc()['count'];
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
        /* .card {
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
        } */
        .status {
          padding: 20px; /* Adds padding inside the status section */
          background: rgba(0, 0, 0, 0.8); /* Slight background for better visibility */
          border-radius: 20px; /* Rounded corners */
        }

        .card {
          background: rgba(0, 0, 0, 0.7); /* More contrast for cards */
          border: 2px solid rgba(255, 255, 255, 0.1); /* Subtle border for depth */
        }

        .card:hover {
          transform: scale(1.05) rotate(2deg); /* Slight rotation on hover for effect */
        }

        .card h3 {
          font-size: 1.5rem; /* Header size */
        }

        .count {
          text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.6); /* Enhanced shadow for visibility */
        }

        .grid {
          margin-bottom: 20px; /* Space between rows */
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
        .testimonials {
        margin: 0px 100px;
        padding: 20px;
        border-radius: 20px;
        }

        .testimonials .overflow-x-auto::-webkit-scrollbar {
        width: 0;
        height: 0;
        }

        .testimonials .overflow-x-auto::-webkit-scrollbar-thumb {
        background-color: transparent;
        }

        .testimonials .overflow-x-auto::-webkit-scrollbar-track {
        background-color: transparent;
        }

        .testimonials .overflow-x-auto {
        overflow-x: auto;
        white-space: nowrap; /* Prevent wrapping of cards */
        max-height: 64rem; /* Optional: Set a maximum height for the section */
        }

        .testimonials .flex {
        flex-wrap: nowrap; /* Ensure cards are in a single row */
        }

        .card {
        margin-top: 20px;
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

        .testimonials .card img {
        border-radius: 20px 20px 0 0;
        width: 100%;
        height: 100px;
        margin-bottom: 10px;
        object-fit: cover;
        }

        .testimonials .card div {
        padding: 20px;
        text-align: center;
        color: #fff;
        }

        .testimonials .card p {
        font-size: 14px;
        }

        .logo {
        animation: moveUpDown 2s ease-in-out infinite;
        }

        .btn-connect {
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-connect:hover {
            background: rgba(0, 0, 0, 0.5);
        }

        .video-preview {
            padding: 20px;
            background: rgba(0, 0, 0, 0.8);
            border-radius: 20px;
        }

        .full-video {
            width: 100%; /* Full width for the main video */
            height: 500px; /* Adjust height as needed */
            border-radius: 10px;
        }

        .video {
            width: 300px; /* Width for the scrollable videos */
            height: 169px; /* Maintain aspect ratio */
            border-radius: 10px;
        }


        @keyframes moveUpDown {
        0% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-20px);
        }
        100% {
            transform: translateY(0);
        }
        }
        @media (max-width: 768px) {
            .mobile-menu {
                display: block;
                background: rgba(0, 0, 0, 0.7);
            }
            .desktop-menu {
                display: none;
            }
            .full-video {
              height: 230px;
            }
            .testimonials {
            margin: 0px 0px;
            padding: 20px;
            border-radius: 20px;
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
     <i class="fas fa-bars fa-2x">
     </i>
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
    <h1 class="text-4xl font-bold">
     ONE PRIDE RP
    </h1>
    <p class="mt-4 max-w-2xl">
    Server One Pride Roleplay adalah sebuah server dengan fitur modern dan mappingan realistis, server ini menawarkan pengalaman bermain yang sangat menyenangkan. Fitur-fitur seperti sistem ekonomi yang realistis, sistem kejahatan yang kompleks, dan sistem roleplay yang sangat detail membuat server ini sangat populer di kalangan pemain GTA SAMP.
    </p>
    <div class="flex flex-wrap justify-center space-x-4 mt-8">
        <img alt="Logo" class="w-60 h-60 logo" height="100" src="assets/oprp.png" width="100"/>
    </div>
    <div class="flex space-x-4 mt-8">
    <button class="px-6 py-3 bg-white text-black rounded-full hover:bg-gray-200">
        <a href="https://discord.gg/onepride">JOIN DISCORD</a>
    </button>
    <button class="btn-connect px-6 py-3 text-white rounded-full">
        <a href="samp://104.234.180.199:7033">CONNECT</a>
    </button>
</div>

   </main>
   <section class="status mt-12 mx-4 md:mx-12 lg:mx-24">
  <h2 class="text-3xl font-bold text-center mb-4">Status Server</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
    <div class="card bg-gray-800 p-6 rounded-lg text-center shadow-lg transition-transform transform hover:scale-105">
      <h3 class="text-xl font-semibold">Jumlah Warga</h3>
      <p class="text-5xl mt-2 count text-blue-400 font-bold" data-target="<?php echo $jumlahWarga; ?>">0</p>
    </div>
    <div class="card bg-gray-800 p-6 rounded-lg text-center shadow-lg transition-transform transform hover:scale-105">
      <h3 class="text-xl font-semibold">Jumlah Banned</h3>
      <p class="text-5xl mt-2 count text-red-400 font-bold" data-target="<?php echo $jumlahBanned; ?>">0</p>
    </div>
    <div class="card bg-gray-800 p-6 rounded-lg text-center shadow-lg transition-transform transform hover:scale-105">
      <h3 class="text-xl font-semibold">Jumlah Rumah</h3>
      <p class="text-5xl mt-2 count text-green-400 font-bold" data-target="<?php echo $jumlahPolisi; ?>">0</p>
    </div>
    <div class="card bg-gray-800 p-6 rounded-lg text-center shadow-lg transition-transform transform hover:scale-105">
      <h3 class="text-xl font-semibold">Jumlah Bisnis</h3>
      <p class="text-5xl mt-2 count text-yellow-400 font-bold" data-target="<?php echo $jumlahEMS; ?>">0</p>
    </div>
  </div>
</section>

<section class="video-preview mt-12 mx-4 md:mx-12 lg:mx-24">
  <h2 class="text-3xl font-bold text-center mb-4">Preview</h2>
  
  <div class="flex justify-center mb-4">
    <iframe class="full-video" src="https://www.youtube.com/embed/IhswMHRo2KY" frameborder="0" allowfullscreen></iframe>
  </div>
  
  <div class="overflow-x-auto">
    <div class="flex space-x-4">
      <iframe class="video" src="https://www.youtube.com/embed/-cxIpK44kAk" frameborder="0" allowfullscreen></iframe>
      <iframe class="video" src="https://www.youtube.com/embed/gYZW9c8wCaY" frameborder="0" allowfullscreen></iframe>
        <iframe class="video" src="https://www.youtube.com/embed/zcb4soIirZo" frameborder="0" allowfullscreen></iframe>
          <iframe class="video" src="https://www.youtube.com/embed/p8F_SwZQVsQ" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
</section>

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
   document.getElementById('mobile-menu-button').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
  
    document.addEventListener("DOMContentLoaded", function() {
    const counts = document.querySelectorAll('.count');
    
    counts.forEach(count => {
      const target = +count.getAttribute('data-target');
      let current = 0;
      const increment = Math.ceil(target / 100); // Adjust the speed of counting
      
      const updateCount = () => {
        if (current < target) {
          current += increment;
          if (current > target) current = target; // Ensure it doesn't go over
          count.textContent = current;
          setTimeout(updateCount, 50); // Adjust speed here (lower is faster)
        } else {
          count.textContent = target; // Set to target when done
        }
      };
      
      updateCount();
    });
  });
  </script>
 </body>
</html>