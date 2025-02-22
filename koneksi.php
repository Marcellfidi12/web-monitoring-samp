<?php
$host = '104.234.180.199';
$username = 'u79_21JEEoZxRR';
$password = '0asN3Lc^Pm.IIGEUnWWUQvdh';
$database = 's79_onpret';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
  die('Koneksi gagal: ' . mysqli_connect_error());
}

?>