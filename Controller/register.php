<?php
   
    $name = "";
    $email = "";
    $pass = "";
    $re_pass = "";
    $safe = 1;

    $conn = mysqli_connect('localhost', 'root', '', 'punix');

    if(isset($_POST['signup'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        $re_pass =mysqli_real_escape_string($conn, $_POST['re_pass']);

        if($pass == $re_pass) {
            $safe = 1;
        } else {
            $safe = 0;
            echo "<script type='text/javascript'>alert('Password do not match.'); window.location.href='../Login_Register/register.html';</script>";
        }
        if (empty($name)) {
            echo "<script type='text/javascript'>alert('Name still empty.'); window.location.href='Registrasi.html';</script>";
            $safe = 0;
        }
        if (empty($email)) {
            echo "<script type='text/javascript'>alert('Email still empty.'); window.location.href='Registrasi.html';</script>";
            $safe = 0;
        }
        if (empty($pass)) { 
            echo "<script type='text/javascript'>alert('Password still empty.'); window.location.href='Registrasi.html';</script>";
            $safe = 0;
        } 
        if (empty($re_pass)) { 
            echo "<script type='text/javascript'>alert('Password still empty.'); window.location.href='Registrasi.html';</script>";
            $safe = 0;
        }

        if (strlen($pass) < 6) {
            echo "<script type='text/javascript'>alert('Password is less than 6 character.'); window.location.href='../Login_Register/register.html';</script>";
            $safe = 0;
        }

        $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) {
            if ($user['email'] === $email) {
                echo "<script type='text/javascript'>alert('Email has already used.'); window.location.href='../Login_Register/register.html';</script>";
                $safe = 0;
            }
        }

        if ($safe == 1) {
            $encpass = md5($pass);
            $query = "INSERT INTO users (id_user, name, email, password, tipe) VALUES('', '$name', '$email', '$encpass', 1)";
            if(mysqli_query($conn, $query)) {
                $last_id = mysqli_insert_id($conn);
                $query2 = "INSERT INTO carts (id_cart, id_user) VALUES('', '$last_id')";
                if(mysqli_query($conn, $query2)){
                    echo "<script type='text/javascript'>alert('Registration Success.'); window.location.href='../Login_Register/login.html';</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Registration Failed. Please try again later.'); window.location.href='../Login_Register/register.html';</script>";
            }
        }
        mysqli_close($conn);
    }
?>