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
?>
<!DOCTYPE html>
<html lang="en">   
    <head>
        <meta charset="UTF-8"> 
        <link rel="stylesheet" href="CSS/TrackOrder.css">
        <title>Track Order</title>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'><link rel="stylesheet" href="./style.css">
    </head>    
    <body>
        <div></div>
        <?php
            echo "<div class='card'>";
                            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "punix";

            $conn = mysqli_connect($servername, $username, $password, $database);
            
            $sql = "SELECT * FROM transactions WHERE id_user = '$loggedin_id';";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<div class='info'>";
                            echo "<div class='row'>";
                echo "<div class='col-5 pull-right'>";
                echo "<span id='heading'>Order ID.</span><br>";
                echo "<span id='details'>";                 
                echo $row['id_transaction'];
                echo "</span>";
                echo "</div>";
                echo "</div>";      
                echo "</div>";      
                echo "<div class='tracking'>";
                echo "<div class='title'>Tracking Order</div>";
                echo "</div>";
                echo "<div class='progress-track'>";
                echo "<ul id='progressbar'>";
                if (str_contains($row["status"],'On Process')){
                    echo "<li class='step0 active' id='step1'>Ordered</li>";
                    echo "<li class='step0 text-center' id='step2'>In Kitchen</li>";
                    echo "<li class='step0 text-center' id='step3'>On The Way</li>";
                    echo "<li class='step0 text-center' id='step4'>Delivered</li>";
                } else if (str_contains($row["status"],'In Kitchen')){
                    echo "<li class='step0 active' id='step1'>Ordered</li>";
                    echo "<li class='step0 text-center active' id='step2'>In Kitchen</li>";
                    echo "<li class='step0 text-center' id='step3'>On The Way</li>";
                    echo "<li class='step0 text-center' id='step4'>Delivered</li>";
                } else if (str_contains($row["status"],'On The Way')){
                    echo "<li class='step0 active' id='step1'>Ordered</li>";
                    echo "<li class='step0 text-center active' id='step2'>In Kitchen</li>";
                    echo "<li class='step0 text-center active' id='step3'>On The Way</li>";
                    echo "<li class='step0 text-center' id='step4'>Delivered</li>";
                } else {
                    echo "<li class='step0 active' id='step1'>Ordered</li>";
                    echo "<li class='step0 text-center active' id='step2'>In Kitchen</li>";
                    echo "<li class='step0 text-center active' id='step3'>On The Way</li>";
                    echo "<li class='step0 text-center active' id='step4'>Delivered</li>";
                }
                echo "</ul>";
                echo "</div>";                
            }
            echo "<div class='footer'>";
            echo "<div class='row'>";
            echo "<div class='col-10'><a href='../Main_Menu/index.php'>Back to Main Menu</a></div>";
            echo "</div>";             
            echo "</div>";
            echo "</div>";
        ?>
            
    </body>    
</html>
