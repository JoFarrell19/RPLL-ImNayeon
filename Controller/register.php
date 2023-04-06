<?php
// memeriksa apakah form telah disubmit
if(isset($_POST['signup'])) {
    // mengambil data dari form HTML
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $re_pass = $_POST['re_pass'];

    // memastikan bahwa kedua password yang dimasukkan cocok
    if($pass == $re_pass) {
        // menghubungkan ke database
        $conn = mysqli_connect("localhost", "root", " ", "punix");

        // memeriksa koneksi ke database
        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // menyimpan data ke dalam database
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pass')";

        if(mysqli_query($conn, $sql)) {
            echo "Registration successful";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // menutup koneksi ke database
        mysqli_close($conn);
    } else {
        echo "Passwords do not match";
    }
}
?>