<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "punix";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$user_id = $_SESSION["user_id"];

$sql = "SELECT transactions.*, detailed_transactions.id_menu, detailed_transactions.quantity, menu.name
        FROM transactions
        INNER JOIN detailed_transactions ON transactions.id_transaction = detailed_transactions.id_transaction
        INNER JOIN menu ON detailed_transactions.id_menu = menu.id_menu
        WHERE transactions.id_user = $user_id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID User:" . $row["id_user"]. "<br>";
        echo "Transaction ID: " . $row["id_transaction"]. "<br>";
        echo "Menu: " . $row["name"]. "<br>";
        echo "Quantity: " . $row["quantity"]. "<br>";
        echo "Status: " . $row["status"]. "<br>";
        echo "Date: " . $row["date"]. "<br><br>";
    }
} else {
    echo "Tidak ada data";
}

mysqli_close($conn);
?>