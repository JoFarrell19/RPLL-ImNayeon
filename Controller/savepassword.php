<?php
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'punix');
    $user_check=$_SESSION['iduser'];
    $sql=mysqli_query($con,"select * from users where id_user='$user_check'");
    $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $loggedin_id=$row['id_user'];
    if(!isset($loggedin_id) || $loggedin_id==NULL) {
        echo "<script type='text/javascript'>alert('Please login first.'); window.location.href='../Login_Register/login.html'</script>";
    }

    $password1 = "";
    $password2 = "";
    $password = "";
    $safe = 1;
    if (isset($_POST['submit'])) {
        $password1 = mysqli_real_escape_string($con, $_POST['pass']);
        $password2 = mysqli_real_escape_string($con, $_POST['re_pass']);

        if($password1==$password2){
            $password = $password1;
        }

        if (empty($password)) { 
            echo "<script type='text/javascript'>alert('Password still empty'); window.location.href='../EditProfile/ChangePassword.php';</script>";
            $safe = 0;
        }

        if (strlen($password) < 6) {
            echo "<script type='text/javascript'>alert('Password less than 6 character'); window.location.href='../EditProfile/ChangePassword.php';</script>";
            $safe = 0;
        }

        if ($safe == 1) {
            $password = md5($password);
            $sql="UPDATE users SET password='$password' where id_user='$loggedin_id'";
            if (mysqli_query($con,$sql)){
                echo "<script type='text/javascript'>alert('Password changed.'); window.location.href='../EditProfile/ChangePassword.php';</script>";
            }else{
                echo "<script type='text/javascript'>alert('Failed to save.'); window.location.href='../EditProfile/ChangePassword.php';</script>";
            }
        }
    }
?>