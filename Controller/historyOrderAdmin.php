<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "punix";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
echo "Connection Success";

$user_id = $_SESSION["user_id"];

$sql = "SELECT transactions.*, detailed_transactions.id_menu, detailed_transactions.quantity, menu.name
        FROM transactions
        INNER JOIN detailed_transactions ON transactions.id_transaction = detailed_transactions.id_transaction
        INNER JOIN menu ON detailed_transactions.id_menu = menu.id_menu";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID User:" . $row["id_user"]. "<br>";
        echo "Name : " . $row["name"]. "<br>";
        echo "Transaction ID: " . $row["id_transaction"]. "<br>";
        echo "Menu: " . $row["name"]. "<br>";
        echo "Quantity: " . $row["quantity"]. "<br>";
        echo "Status: " . $row["status"]. "<br>";
        echo "Date: " . $row["date"]. "<br><br>";
    }
} else {
    echo "No data";
}

mysqli_close($conn);
?>