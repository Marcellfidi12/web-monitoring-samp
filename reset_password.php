<?php
require_once 'koneksi.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token is valid and not expired
    $query = "SELECT * FROM playerucp WHERE reset_token='$token' AND reset_expiration > NOW()";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Display reset password form
        echo '<form action="update_password.php" method="POST">
            <input type="hidden" name="token" value="' . $token . '"/>
            <button type="submit" class="btn mt-2">Reset Password</button>
        </form>';
    } else {
        echo "Invalid or expired token.";
    }
}
?>
