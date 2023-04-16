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
        echo "<script type='text/javascript'>alert('Name Already Exist');</script>";
    } else {
        $image = $_FILES['image']['name'];
        $target = "../img/" . basename($image);
        $query = "INSERT INTO menu (name, price, description, image) VALUES ('$name', $price, '$description','$image')";
        mysqli_query($conn, $query);

        
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        
        echo "<script type='text/javascript'>alert('Success Added'); window.location.href='../Main_Menu_Admin/MainMenuAdmin.php';</script>";
    }

    mysqli_close($conn);
}
?>