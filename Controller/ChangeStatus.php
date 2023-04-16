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

if (isset($_POST['submit'])) {
    $radio = $_POST["status"];
    $id_transaction = $_GET["id"];

    $sql = "UPDATE transactions SET status = '$radio' WHERE id_transaction = '$id_transaction'";
    if ($con->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('Success Edited'); window.location.href='../Menu_List_Admin/MenuListAdmin.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Error');</script>";
    }
}
?>