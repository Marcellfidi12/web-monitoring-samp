<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];

    // Update the password and clear the reset token and expiration
    $queryUpdate = "UPDATE playerucp SET password='', salt='', reset_token='', reset_expiration='' WHERE reset_token='$token'";
    if (mysqli_query($conn, $queryUpdate)) {
        echo "Password has been reset successfully!,silahkan login kembali ke dalam server dan buat password baru.";
    } else {
        echo "Failed to reset password.";
    }
}
?>
