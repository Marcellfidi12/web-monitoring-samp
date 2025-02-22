<?php
require 'koneksi.php'; // Include your database connection if needed
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
    header('Location: index.php');
    exit;
}

$cek = $_SESSION['ucp'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reportType = $_POST['report_type'];
    $description = $_POST['description'];

    // Generate a unique report ID
    $uniqueId = 'report#' . uniqid();

    // Handle file upload
    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $imageSize = $_FILES['image']['size']; // Get the file size

        // Check if the file size is greater than 3 MB
        if ($imageSize > 3 * 1024 * 1024) {
            $errorMessage = "File size exceeds the maximum limit of 3 MB.";
        } else {
            $imagePath = $uploadDir . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

            // Send email
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'onepride.my.id'; // Set your SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'bot@onepride.my.id'; // Your email
                $mail->Password = 'oprpbot321@'; // Your email password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('bot@onepride.my.id', 'Bug Report System');
                $mail->addAddress('marcellfidi@gmail.com'); // Recipient email

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Report Baru: ' . $reportType;
                $mail->Body    = nl2br("Report ID: $uniqueId<br>Nama Ucp: $cek<br>Judul Report : $reportType<br>Keterangan : $description");
                if ($imagePath) {
                    $mail->addAttachment($imagePath); // Attach the image
                }

                $mail->send();
                $successMessage = 'Report sent successfully!';
            } catch (Exception $e) {
                $errorMessage = "Report could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
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
        .form-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
            max-width: 500px;
            margin: auto;
            margin-top: 100px; /* Center it vertically */
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #ccc;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #666;
            border-radius: 4px;
            background: #333;
            color: #fff;
        }
        .form-group button {
            background-color: #3b82f6;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        .form-group button:hover {
            background-color: #2563eb;
        }
        .message {
            text-align: center;
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .mobile-menu {
                display: block;
                background: rgba(0, 0, 0, 0.7);
            }
            .form-container {
                margin: 40px;
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
    <button class="btn mt-4 w-full">
     Login
    </button>
   </div>
   <div class="form-container">
        <h2>Report a Bug</h2>
        <?php if (isset($successMessage)) : ?>
            <p class="message" style="color: green;"><?= $successMessage; ?></p>
        <?php elseif (isset($errorMessage)) : ?>
            <p class="message" style="color: red;"><?= $errorMessage; ?></p>
        <?php endif; ?>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="report_type">Report Type:</label>
                <input type="text" id="report_type" name="report_type" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Attach Image(Max 3MB):</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            <div class="form-group">
                <button type="submit">Send Report</button>
            </div>
        </form>
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