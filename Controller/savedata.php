<?php
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'punix');
    $user_check=$_SESSION['iduser'];
    $sql=mysqli_query($con,"select * from users where id_user='$user_check'");
    $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $loggedin_id=$row['id_user'];
    $loggedin_email=$row['email'];
    if(!isset($loggedin_id) || $loggedin_id==NULL) {
        echo "<script type='text/javascript'>alert('Please login first.'); window.location.href='../Login_Register/login.html'</script>";
    }
    $safe = 1;
    $name = "";
    $email = "";
    
    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        if (empty($name)) {
            echo "<script type='text/javascript'>alert('Name still empty'); window.location.href='../EditProfile/EditProfile.php';</script>";
            $safe = 0;
        }
        if (empty($email)) { 
            echo "<script type='text/javascript'>alert('Email still empty'); window.location.href='../EditProfile/EditProfile.php';</script>";
            $safe = 0;
        }
        
        $user_check_query = "SELECT * FROM users WHERE email <>'$loggedin_email' LIMIT 1";
        $result = mysqli_query($con, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) {    
            if ($user['email'] === $email) {
                echo "<script type='text/javascript'>alert('Email has already used.'); window.location.href='../EditProfile/EditProfile.php';</script>";
                $safe = 0;
            }
        }
        if ($safe == 1) {
            $query = "UPDATE users SET name = '$name', email = '$email' WHERE id_user = '$loggedin_id'";
            if (mysqli_query($con, $query)){
                echo "<script type='text/javascript'>alert('Data saved'); window.location.href='../EditProfile/EditProfile.php';</script>";
            }else{
                echo "<script type='text/javascript'>alert('Failed to save'); window.location.href='../EditProfile/EditProfile.php';</script>";
            }    
        }
    }
?>