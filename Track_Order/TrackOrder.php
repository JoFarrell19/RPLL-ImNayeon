<!-- <?php
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'punix');
    $user_check=$_SESSION["iduser"];
    $sql=mysqli_query($con,"select * from users where id_user='$user_check'");
    $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $loggedin_id=$row['id_user'];
    if(!isset($loggedin_id) || $loggedin_id==NULL) {
        echo "<script type='text/javascript'>alert('Please Login First.'); window.location.href='../Login_Register/login.html'</script>";
    }
?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/TrackOrder.css">
    <title>Track Order</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div></div>
    <div class="card">
        <div class="title">Tracking Order</div>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "punix";

            $conn = mysqli_connect($servername, $username, $password, $database);

            $sql = "SELECT * FROM transactions WHERE id_user = 0;";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo("<div class='tracking'>");
                echo ("<div class='title'>".$row["status"]."</div>");
                echo("</div>");
            }
            ?>
        <div class="footer">
            <div class="row">
                <div class="col-10"><a href="../Main_Menu/Main_Menu.php">Back</a></div>
            </div>
        </div>
    </div>
</body>

</html>