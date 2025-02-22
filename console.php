<?php
require_once 'koneksi.php';

// Start the session
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
    header('Location: index.php');
    exit;
}

$cek = $_SESSION['ucp'];

// Query to get player data from players table
$queryPlayers = "SELECT * FROM players WHERE ucp = '$cek'";
$resultPlayers = mysqli_query($conn, $queryPlayers);
$playersData = array();

// Query to get email from playerucp table
$queryUcp = "SELECT * FROM playerucp WHERE ucp = '$cek'";
$resultUcp = mysqli_query($conn, $queryUcp);
$emailLinked = false; // To check if the email is linked
$emailAddress = ''; // To store the email address

if ($rowUcp = mysqli_fetch_assoc($resultUcp)) {
    if ($rowUcp['email']) {
        $emailLinked = true;
        $emailAddress = $rowUcp['email'];
    }
}

while ($rowPlayers = mysqli_fetch_assoc($resultPlayers)) {
    $playersData[] = $rowPlayers;
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
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
        .console {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: transparent;
        }
        .console h1 {
            margin: 20px;
            font-size: 25px;
            padding: 10px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 5px;
        }
        .console table {
            width: 80%;
            border-collapse: collapse;
        }
        .console th, .console td {
            border: 1px solid #000;
            background: rgba(0, 0, 0, 0.7);
            padding: 10px;
            text-align: left;
        }
        .console th {
            background: rgba(0, 0, 0, 0.7);
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
   <div class="console">
    <h1>Statistik Akun: <?=$_SESSION['ucp'];?></h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Karakter</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($playersData)) { ?>
                <tr>
                    <td colspan="5" align="center">Data Pemain Kosong</td>
                </tr>
            <?php } else { ?>
                <?php foreach ($playersData as $player) { ?>
                    <tr>
                        <td><?php echo $player['reg_id']; ?></td>
                        <td><?php echo $player['username']; ?></td>
                        <td>
                            <i class="fas fa-eye cursor-pointer" 
                               onclick="showModal('<?php echo $player['reg_id']; ?>', '<?php echo $player['username']; ?>', '<?php echo $player['email']; ?>', '<?php echo $player['reg_date']; ?>', '<?php echo $player['skin']; ?>', '<?php echo $player['money']; ?>', '<?php echo $player['level']; ?>', '<?php echo $player['last_login']; ?>', '<?php echo $player['bmoney']; ?>')"></i>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>

    <?php if (!$emailLinked) { ?>
        <form action="link_email.php" method="POST">
            <input type="email" name="email" required placeholder="Masukkan Email" class="mt-4 p-2 rounded"/>
            <button type="submit" class="btn mt-2">Kaitkan Email</button>
        </form>
    <?php } else { ?>
        <p class="mt-4">Email sudah terkait: <strong><?php echo $emailAddress; ?></strong></p>
        <form action="request_reset.php" method="POST">
        <!-- <input type="email" name="email" style="color: #000;" value="<?php echo $emailAddress; ?>" placeholder="<?php echo $emailAddress; ?>" class="mt-4 p-2 rounded" disabled/> -->
        <button type="submit" class="btn mt-2">Request Password Reset</button>
    <?php } ?>
</form>
</div>
<div id="accountStatsModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="bg-black bg-opacity-75 w-full h-full absolute" onclick="closeModal()"></div>
    <div class="bg-gray-800 rounded-lg p-6 z-10 w-11/12 md:w-1/3">
        <h2 class="text-xl font-bold mb-4">Statistik Akun: <?=$_SESSION['ucp'];?></h2>
        <p><strong>ID:</strong> <span id="modalRegId"></span></p>
        <p><strong>Nama Karakter:</strong> <span id="modalUsername"></span></p>
        <p><strong>Level:</strong> <span id="modalLevel"></span></p>
        <p><strong>Email:</strong> <span id="modalEmail"></span></p>
        <p><strong>Tanggal Registrasi:</strong> <span id="modalRegDate"></span></p>
        <p><strong>Terakhir Login:</strong> <span id="modalLastLogin"></span></p>
        <p><strong>Skin ID:</strong> <span id="modalSkinId"></span></p>
        <p><strong>Cash:</strong> $<span id="modalMoney"></span></p>
        <p><strong>Bank:</strong> $<span id="modalBank"></span></p>
        <button class="btn mt-4" onclick="closeModal()">Close</button>
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
    function showModal(regId, username, email, regDate, skinID, money, level, lastLogin, bank) {
        document.getElementById('modalRegId').innerText = regId;
        document.getElementById('modalUsername').innerText = username;
        document.getElementById('modalEmail').innerText = email;
        document.getElementById('modalRegDate').innerText = regDate;
        document.getElementById('modalSkinId').innerText = skinID;
        document.getElementById('modalMoney').innerText = money;
        document.getElementById('modalLevel').innerText = level;
        document.getElementById('modalLastLogin').innerText = lastLogin;
        document.getElementById('modalBank').innerText = bank;
        document.getElementById('accountStatsModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('accountStatsModal').classList.add('hidden');
    }
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