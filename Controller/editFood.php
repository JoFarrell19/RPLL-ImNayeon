<?php
    if(isset($_POST['updatefood'])) {
        $id_menu = $_POST['id_menu'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        $result = mysqli($mysqli, "UPDATE menu SET name='$name',price='$price',desc='$description' WHERE id_menu=$id_menu");

        include("dbcon.php");

        header("Location : MainMenu_Admin.html");
    }
?>