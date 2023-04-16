<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "punix";

    $id_menu = $_GET['menu'];

    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE from menu WHERE id_menu = $id_menu";

    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('Success Deleted'); window.location.href='../Menu_List_Admin/MenuListAdmin.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Error');</script>";
    }

    ?>