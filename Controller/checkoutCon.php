<?php
    // $user_id = $_SESSION["user_id"];

    if(isset($_POST['checkout'])) {   
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "punix";

        $conn = mysqli_connect($servername, $username, $password, $database);
        
        $timestamp = date("Y-m-d H:i:s");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO transactions (status, date) VALUES ('On Process', '$timestamp')"; 
        
        if (mysqli_query($conn, $sql)) {
            $sql1 = "DELETE FROM detailed_carts WHERE id_cart=1";
            mysqli_query($conn, $sql1);
            echo "<script type='text/javascript'>alert('Order Received.'); window.location.href='../Track_Order/TrackOrder.html';</script>";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          } 
    }
?>