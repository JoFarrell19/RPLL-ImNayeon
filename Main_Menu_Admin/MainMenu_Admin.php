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
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Main Menu</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css'><link rel="stylesheet" href="./style.css">
</head>

<body>
<!-- partial:index.partial.html -->
<main class="site-wrapper">
  <div class="pt-table desktop-768">
    <div class="pt-tablecell page-home relative" style="background-image: url(../img/abstract-black-geometric-background-with-simple-hexagonal-elements-medical-technology-or-science-design-hexagons-pattern-illustration-vector.jpg);
    background-position: center;
    background-size: cover;">
                    <div class="overlay"></div>

                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                                <div class="page-title  home text-center">
                                  <span class="heading-page">Admin Main Menu
                                  </span>
                                    <p class="mt20">Welcome to Admin Main Menu!!!</p>
                                </div>

                                <div class="hexagon-menu"> 
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a  class="hex-content" a href="../Menu_List_Admin/MenuListAdmin.php">
                                            <span class="hex-content-inner">
                                                <span class="title">Menu List</a></span>
                                            </span>
                                            <!-- <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg> -->
                                        </a>    
                                    </div>
                                </div>
                                <div class="hexagon-menu clear"> 
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a  class="hex-content" a href="../Add_Menu/Add_Menu.php">
                                            <span class="hex-content-inner">
                                                <span class="title">Add Menu</a></span>
                                            </span>
                                            <!-- <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg> -->
                                        </a>
                                    </div>
                                </div>
                                <div class="hexagon-menu"> 
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a  class="hex-content" a href="../HistoryOrder/HistoryOrderAdmin.php">
                                            <span class="hex-content-inner">
                                                <span class="title">See Order History</a></span>
                                            </span>
                                            <!-- <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg> -->
                                        </a>
                                    </div>
                                </div>
                                <div class="hexagon-menu"> 
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a  class="hex-content" a href="../Controller/logout.php">
                                            <span class="hex-content-inner">
                                                <span class="title">Log Out</a></span>
                                            </span>
                                            <!-- <svg viewBox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg> -->
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </main>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'></script>
</body>
</html>
