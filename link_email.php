<?php
require_once 'koneksi.php';
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $ucp = $_SESSION['ucp'];

    // Update the player's email in the playerucp table
    $query = "UPDATE playerucp SET email = '$email' WHERE ucp = '$ucp'";
    if (mysqli_query($conn, $query)) {
        // Redirect back with success message
        $_SESSION['message'] = "Email berhasil dikaitkan!";
        header('Location: console.php'); // Replace with your actual account page URL
        exit;
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat mengaitkan email.";
    }
}
?>
