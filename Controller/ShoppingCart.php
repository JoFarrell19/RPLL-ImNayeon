<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'punix');
$user_check=$_SESSION["iduser"];
$sql=mysqli_query($con,"select * from users where id_user='$user_check'");
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
$loggedin_id=$row['id_user'];
if(!isset($loggedin_id) || $loggedin_id==NULL) {
    echo "<script type='text/javascript'>alert('Please Login First.'); window.location.href='../Login_Register/login.html'</script>";
}

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

$sql = "SELECT detailed_carts.id_detailed_cart, detailed_carts.id_cart, detailed_carts.id_menu, detailed_carts.quantity 
FROM detailed_carts 
JOIN carts 
ON detailed_carts.id_cart=carts.id_cart 
WHERE carts.id_user = $user_check";


if ($conn->query($sql) === TRUE) {
    echo "Success Insert";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>