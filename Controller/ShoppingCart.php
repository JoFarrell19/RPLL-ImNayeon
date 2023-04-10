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

$sql = "SELECT *
FROM detailed_carts
JOIN menu ON menu.id_menu = detailed_carts.id_menu
JOIN carts ON carts.id_cart = detailed_cart.id_cart
WHERE cart.id_user = $user_id";

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