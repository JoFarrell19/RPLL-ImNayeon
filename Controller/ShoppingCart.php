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

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "punix";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection Failed " . $conn->connect_error);
}


$id_menu = $_GET["id_menu"];
$quantity = $_GET["quantity"];

$sql = "SELECT detailed_carts.id_detailed_cart, detailed_carts.id_cart, detailed_carts.id_menu, detailed_carts.quantity 
FROM detailed_carts 
JOIN carts 
ON detailed_carts.id_cart=carts.id_cart 
WHERE carts.id_user = $user_check";

foreach ($rows as $row) {
    $detailedCart = new DetailedCart();
    $detailedCart->Id_Detailed_Cart = $row['Id_Detailed_Cart'];
    $detailedCart->Id_Cart = $row['Id_Cart'];
    $detailedCart->Id_Menu = $row['Id_Menu'];
    $detailedCart->Quantity = $row['Quantity'];

    if (!$detailedCart) {
        die("No Product Data Inserted");
    } else {
        $detailedCarts[] = $detailedCart;
    }
}
$id_menu_int = intval($id_menu);
$isFound = false;

for ($i = 0; $i < count($detailedCarts); $i++) {
    if ($detailedCarts[$i]->Id_Menu == $id_Menu_int) {
        $query = "UPDATE detailed_carts SET quantity = quantity + " . $quantity . " WHERE id_detailed_cart = ? ";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $detailedCarts[$i]->Id_Detailed_Cart);
        $stmt->execute();
        $isFound = true;
        if ($stmt->affected_rows > 0) {
            echo "Added To Cart";
        } else {
            echo "Failed";
        }
        return;
    }
}

if ($isFound == false) {
    $query = "INSERT INTO detailed_carts(id_cart, id_menu, quantity) VALUES (?,?,?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("iii", $detailedCarts[0]->Id_Cart, $Id_Menu, $quantity);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "Added To Cart";
    } else {
        echo "Failed";
    }
}

mysqli_close($conn);
?>