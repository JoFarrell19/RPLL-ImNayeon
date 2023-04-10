<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "punix";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection Failed " . $conn->connect_error);
}


$id_menu = $_GET ["id_menu"];
$quantity = $_GET ["quantity"];
$user_id = $_GET ["id_user"];

$sql = "SELECT detailed_carts.id_detailed_cart, detailed_carts.id_cart, detailed_carts.id_drink, detailed_carts.quantity 
FROM detailed_carts 
JOIN carts 
ON detailed_carts.id_cart=carts.id_cart 
WHERE carts.id_user =";


if ($conn->query($sql) === TRUE) {
    echo "Success Insert";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>