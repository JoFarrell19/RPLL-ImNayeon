<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "punix";

session_start();
    $con = mysqli_connect('localhost', 'root', '', 'punix');
    $user_check=$_SESSION["iduser"];
    $sql=mysqli_query($con,"select * from users where id_user='$user_check'");
    $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $loggedin_id=$row['id_user'];
    if(!isset($loggedin_id) || $loggedin_id==NULL) {
        echo "<script type='text/javascript'>alert('Please Login First.'); window.location.href='../Login_Register/login.html'</script>";
    }

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
echo "Connection Success";

$sql = "SELECT transactions.*, detailed_transactions.id_menu, detailed_transactions.quantity, menu.name
        FROM transactions
        INNER JOIN detailed_transactions ON transactions.id_transaction = detailed_transactions.id_transaction
        INNER JOIN menu ON detailed_transactions.id_menu = menu.id_menu
        WHERE transactions.id_user = $user_check";

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
    echo "No data";
}

mysqli_close($conn);
?>