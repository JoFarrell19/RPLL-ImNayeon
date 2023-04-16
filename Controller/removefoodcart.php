<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'punix');
$user_check = $_SESSION["iduser"];
$sql = mysqli_query($con, "select * from users where id_user='$user_check'");
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$loggedin_id = $row['id_user'];
if (!isset($loggedin_id) || $loggedin_id == NULL) {
    echo "<script type='text/javascript'>alert('Please Login First.'); window.location.href='../Login_Register/login.html'</script>";
}

$id_menu = $_GET['id'];

$sql = "DELETE FROM detailed_carts WHERE id_menu = '$id_menu';";
if (mysqli_query($con, $sql)){
    echo "<script type='text/javascript'>alert('Food removed'); window.location.href='../Shopping_Cart/Shopping_Cart.php';</script>";
}else{
    echo "<script type='text/javascript'>alert('Failed to remove'); window.location.href='../Shopping_Cart/Shopping_Cart.php';</script>";
}    
?>