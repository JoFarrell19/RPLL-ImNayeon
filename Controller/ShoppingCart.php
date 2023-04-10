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

$id_menu = $_GET ["id_menu"];
$quantity = $_GET ["quantity"];
$user_id = $_SESSION["user_id"];

$sql =  "SELECT detailed_carts.id_detailed_cart, detailed_carts.id_cart, detailed_carts.id_menu, detailed_carts.quantity 
	FROM detailed_carts 
	JOIN carts 
	ON detailed_carts.id_cart=carts.id_cart 
	WHERE carts.id_user = $user_id";

$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID Detailed Carts: " . $row["id_detailed_cart"] . "<br>";
        echo "ID Cart : " . $row["id_cart"] . "<br>";
        echo "ID Menu: " . $row["id_menu"] . "<br>";
        echo "Quantity : " . $row["quantity"] . "<br>";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
$isFound = false;

for ($i = 0; $i < count($detailedCarts); $i++) {
    if ($detailedCarts[$i]['Id_Drink'] == $id_drink_int) {
        $query = "UPDATE detailed_carts SET quantity = quantity + ".$quantity." WHERE id_detailed_cart = ?";
        $statement = $db->prepare($query);
        $statement->bind_param('i', $detailedCarts[$i]['Id_Detailed_Cart']);
        $statement->execute();
        $isFound = true;
        if ($statement->affected_rows > 0) {
            http_response_code(200);
            echo json_encode(array("message" => "Added To Cart"));
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Failed"));
        }
        return;
    }
}

if ($isFound == false) {
    $query = "INSERT INTO detailed_carts(id_cart, id_drink, quantity) VALUES (?,?,?)";
    $statement = $db->prepare($query);
    $statement->bind_param('iii', $detailedCarts[0]['Id_Cart'], $id_drink_int, $quantity);
    $statement->execute();
    if ($statement->affected_rows > 0) {
        http_response_code(200);
        echo json_encode(array("message" => "Added To Cart"));
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Failed"));
    }
}

// Close connection
mysqli_close($conn);
?>