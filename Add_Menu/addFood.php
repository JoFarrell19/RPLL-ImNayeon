<?php    
$servername = "localhost";
$username = "root";
$password = "";
$database = "punix";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $name = mysqli_real_escape_string($conn, $_POST['menu_name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['menu_description']);

    
    $query = "SELECT * FROM menu WHERE name = '$name'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        echo "Name already exists in the menu.";
    } else {
        $image = $_FILES['image']['name'];
        $target = "../img/" . basename($image);
        $query = "INSERT INTO menu (name, price, description, image) VALUES ('$name', $price, '$description','$image')";
        mysqli_query($conn, $query);

        
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        
        echo "Data inserted successfully.";
    }

    mysqli_close($conn);
}
?>