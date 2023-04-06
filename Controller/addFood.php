<?php    
    if(isset($_POST['addFood'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        include("dbcon.php");
        $checkdup = "SELECT * FROM menu WHERE name = '".$name."'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            echo "Menu sudah ada";
            
        } else {
            // Tambahkan user baru ke database
            $sql = "INSERT INTO menu (name, price, description) VALUES ('$name','$price','$description')";
        
            if (mysqli_query($conn, $sql)) {

                echo "nambah menu";

            } else {

            echo "Error: " . $sql . "<br>" . mysqli_error($conn);

            }
        }
    }
?>