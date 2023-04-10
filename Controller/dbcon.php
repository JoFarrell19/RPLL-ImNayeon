<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "punix";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("Connection Failed:  " . mysqli_connect_error());
}
echo "Connection Success";
?>