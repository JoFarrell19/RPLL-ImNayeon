<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "punix";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
echo "Connection Success";

$user_id = $_SESSION["user_id"];

$cart_id = $_GET[""];
$menu_id = $_GET["id_menu"];
$qty = $_GET["qty"];

$sql = "SELECT detailed_carts.id_detailed_cart, detailed_carts.id_cart, detailed_carts.id_drink, detailed_carts.quantity 
 FROM detailed_carts 
 JOIN carts 
 ON detailed_carts.id_cart=carts.id_cart 
 WHERE carts.id_user = $user_id";

if($sql == null){
    $sql = "INSERT INTO detailed_carts (id_cart, id_menu, quantity) 
    VALUES ($cart_id, $menu_id, $qty)
    WHERE carts.id_user = $user_id, carts.id_cart = carts.id_user, id_detailed_cart = id_cart";
}else{
    $sql = "Update INTO detailed_carts (id_cart, id_menu, quantity) 
    VALUES ($cart_id, $menu_id, $qty)
    WHERE carts.id_user = $user_id, carts.id_cart = carts.id_user, id_detailed_cart = id_cart";
}

$sql = "INSERT INTO detailed_carts (id_cart, id_menu, quantity) 
VALUES ($cart_id, $menu_id, $qty)
WHERE carts.id_user = $user_id, carts.id_cart = carts.id_user, id_detailed_cart = id_cart";


// Execute query
$result = $conn->query($sql);

// Display results
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. "<br>";
        echo "Quantity: " . $row["quantity"]. "<br>";
    }
} else {
    echo "0 results";
}

// Close connection
mysqli_close($conn);
?>