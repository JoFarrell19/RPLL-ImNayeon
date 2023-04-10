<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "punix";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


$id_cart = $_GET ["id_cart"];
$id_menu = $_GET ["id_menu"];

$sql = "INSERT INTO detailed_carts (id_cart, id_menu, quantity) VALUES ('$id_cart', $id_menu, 1 )";


if ($conn->query($sql) === TRUE) {
    echo "Success Insert";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>