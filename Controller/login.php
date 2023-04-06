<?php
    session_start();  
    $db = mysqli_connect('localhost', 'root', '', 'punix');

    if(isset($_POST["signin"])){
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $sql = "SELECT * from users where email ='$email' and password ='$password'";
	    $result = mysqli_query($db,$sql);
	    $row = mysqli_fetch_array($result);
	    if($row) {
			$_SESSION["iduser"]= $row["id_user"];
            if($row["tipe"] == 1){
                echo "<script type='text/javascript'>alert('Login Success.'); window.location.href='../Main_Menu/index.html'</script>";
            }else{
                echo "<script type='text/javascript'>alert('Login Success.'); window.location.href='../Main_Menu_Admin/MainMenu_Admin.html'</script>";
            }
	    } else {
            echo "<script type='text/javascript'>alert('Login Failed.'); window.location.href='../Login_Register/login.html'</script>";
        }
    }
?>