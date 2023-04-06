<?php

if(isset($_POST['signup'])) {
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "punix";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

   
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $birth = $_POST['birth'];


    
    $sql = "INSERT INTO users (name, address, email, password, birth) VALUES ('$name','$address', '$email', '$password', '$birth' )";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>