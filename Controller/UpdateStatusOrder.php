<?php
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'punix');
    $user_check=$_SESSION['iduser'];
    $sql=mysqli_query($con,"select * from transactions where id_user='$user_check'");
    $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $loggedin_id=$row['id_user'];
    $loggedin_email=$row['email'];
    if(!isset($loggedin_id) || $loggedin_id==NULL) {
        echo "<script type='text/javascript'>alert('Please login first.'); window.location.href='../Login_Register/login.html'</script>";
    }

    $status = "";
    switch (StatusEnum.$status) {
        case StatusEnum::OrderReceived:
            echo "Order Received";
            break;
        case StatusEnum::InKitchen:
            echo "Your Order in the Kitchen";
            break;
        case StatusEnum::OnTheWay:
            echo "Your Order On The Way";
            break;
        case StatusEnum::OnTheWay:
            echo "Enjoy Your Order!";
            break;
    }
    
    if (isset($_POST['submit'])) {
        $status = mysqli_real_escape_string($con, $_POST['status']);
        if (empty($status)) {
            echo "<script type='text/javascript'>alert('Status still empty'); window.location.href='../EditProfile/EditProfile.php';</script>";
            $safe = 0;
        }

        $result = mysqli_query($con, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
    }
?>