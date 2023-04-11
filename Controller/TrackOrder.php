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

// Construct SQL query
$sql = "SELECT transaction.status, transaction.date
from transactions
WHERE transaction.id_user=$user_id";

// Execute query
$result = $conn->query($sql);

// Display results
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Status: " . $row["status"]. "<br>";
        echo "Date: " . $row["date"]. "<br>";
    }
} else {
    echo "0 results";
}

// Close connection
mysqli_close($conn);
?>