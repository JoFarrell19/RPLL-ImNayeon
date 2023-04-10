<?php
  session_start();
  $con = mysqli_connect('localhost', 'root', '', 'punix');
  $user_check = $_SESSION["iduser"];
  $sql = mysqli_query($con, "select * from users where id_user='$user_check'");
  $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
  $loggedin_id = $row['id_user'];
  if (!isset($loggedin_id) || $loggedin_id == NULL) {
      echo "<script type='text/javascript'>alert('Please Login First.'); window.location.href='../Login_Register/login.html'</script>";
  }

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "punix";
        
  $conn = new mysqli($servername, $username, $password, $dbname);

  $id_menu = $_GET['menu'];
  
  $sql = "SELECT x.id_cart FROM carts x JOIN users y ON x.id_user = y.id_user WHERE y.id_user = '$loggedin_id';";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);
  $id = $data['id_cart'];
  
  $sql1 = "SELECT * FROM detailed_carts WHERE id_cart = '$id' && id_menu = '$id_menu';";
  $result2 = mysqli_query($conn, $sql1);
  if (mysqli_num_rows($result2) > 0) {
    $sql2 = "UPDATE detailed_carts SET quantity = quantity + 1 WHERE id_cart = '$id' && id_menu = '$id_menu';";
    if (mysqli_query($conn, $sql2)) {
      echo "<script type='text/javascript'>alert('Added.');window.location.href='../Menu_List/MenuList.php';</script>";
    } else {
      echo "<script type='text/javascript'>alert('Failed.');window.location.href='../Menu_List/MenuList.php';</script>";
    } 
  }else{
    $sql3 = "INSERT INTO detailed_carts (id_cart, id_menu, quantity) VALUES ('$id','$id_menu',1);";
    if (mysqli_query($conn, $sql3)) {
      echo "<script type='text/javascript'>alert('Added.');window.location.href='../Menu_List/MenuList.php';</script>";
    } else {
      echo "<script type='text/javascript'>alert('Failed.');window.location.href='../Menu_List/MenuList.php';</script>";
    } 
  }
?>