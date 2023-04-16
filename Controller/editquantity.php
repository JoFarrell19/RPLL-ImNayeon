<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'punix');
$user_check = $_SESSION["iduser"];
$sql = mysqli_query($con, "select * from users where id_user='$user_check'");
$id_menu = $_GET['id'];
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$loggedin_id = $row['id_user'];
if (!isset($loggedin_id) || $loggedin_id == NULL) {
    echo "<script type='text/javascript'>alert('Please Login First.'); window.location.href='../Login_Register/login.html'</script>";
}
    if (isset($_POST['edit'])) {
        $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
        if (empty($quantity) || $quantity == 0) {
            echo "<script type='text/javascript'>alert('Quantity cant be zero or empty.'); window.location.href='../Shopping_Cart/Shopping_Cart.php';</script>";
        } else {
            $sql = "UPDATE detailed_carts JOIN carts ON detailed_carts.id_cart = carts.id_cart SET detailed_carts.quantity = '$quantity' WHERE carts.id_user = '$loggedin_id' AND detailed_carts.id_menu = '$id_menu';";
            if (mysqli_query($con, $sql)){
                echo "<script type='text/javascript'>alert('Data saved'); window.location.href='../Shopping_Cart/Shopping_Cart.php';</script>";
            }else{
                echo "<script type='text/javascript'>alert('Failed to edit'); window.location.href='../Shopping_Cart/Shopping_Cart.php';</script>";
            }    
        }
    }
?>