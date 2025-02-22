<?php
require_once 'koneksi.php';
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $emailAddress);
    $queryUcp = "SELECT * FROM playerucp WHERE email = '$email'";
    $resultUcp = mysqli_query($conn, $queryUcp);
    
    if (mysqli_num_rows($resultUcp) > 0) {
        $token = bin2hex(random_bytes(10)); // Generate a token
        $expiration = date("Y-m-d H:i:s", strtotime('+1 hour')); // Set expiration time

        // Store token and expiration in the database
        $queryUpdate = "UPDATE playerucp SET reset_token='$token', reset_expiration='$expiration' WHERE email='$email'";
        mysqli_query($conn, $queryUpdate);
        
        // Send email
        $mail = new PHPMailer(true);
        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'onepride.my.id'; // Your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'verification@onepride.my.id'; // Your email
            $mail->Password = 'oprpnihbos123@'; // Your email password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('verification@onepride.my.id', 'One Pride Roleplay');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = 'Click <a href="https://onepride.my.id/reset_password.php?token=' . $token . '">here</a> to reset your password.';

            $mail->send();
            echo 'Password reset berhasil terkirim ke email : ' . $emailAddress;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Email not found.";
    }
}
?>
