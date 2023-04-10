<?php
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'punix');
    $user_check=$_SESSION["iduser"];
    $sql=mysqli_query($con,"select * from users where id_user='$user_check'");
    $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $loggedin_id=$row['id_user'];
    if(!isset($loggedin_id) || $loggedin_id==NULL) {
        echo "<script type='text/javascript'>alert('Please Login First.'); window.location.href='../Login_Register/login.html'</script>";
    }

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

        $sql = "INSERT INTO transactions (id_user, status, date) VALUES ('$loggedin_id','On Process', '$timestamp')"; 
        
        if (mysqli_query($conn, $sql)) {
            $sql1 = "DELETE x FROM detailed_carts x JOIN carts y ON x.id_cart = y.id_cart WHERE y.id_user='$loggedin_id';";
            mysqli_query($conn, $sql1);
            echo mysqli_error($conn);
            echo "<script type='text/javascript'>alert('Order Received.'); window.location.href='../Track_Order/TrackOrder.php';</script>";
          } else {
            echo "<script type='text/javascript'>alert('Order Failed. Please try again.'); window.location.href='../Shopping_Cart/Shopping_Cart.php';</script>";
          } 
    }
?>