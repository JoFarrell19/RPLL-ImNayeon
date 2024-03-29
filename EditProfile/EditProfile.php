
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'><link rel="stylesheet" href="./style.css">
  
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="../Main_Menu/index.php">Punix Restaurant</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link" href="../Main_Menu/index.php">Main Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Menu_List/MenuList.php">Food Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Track_Order/TrackOrder.php">Track Order</a></li>
                    <li class="nav-item"><a class="nav-link" href="../HistoryOrder/HistoryOrderUser.php">History Order</a></li>
                    <li class="nav-item"><a class="nav-link active" href="../EditProfile/EditProfile.php">Edit Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Controller/logout.php">Logout</a></li>
                </ul>
                <form class="d-flex" action="../Shopping_Cart/Shopping_Cart.php">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">
                        <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "punix";
                
                            $conn = mysqli_connect($servername, $username, $password, $database);
                            
                            $sql = "SELECT COUNT(detailed_carts.id_detailed_cart) AS total 
                                FROM detailed_carts 
                                JOIN carts on detailed_carts.id_cart = carts.id_cart
                                WHERE carts.id_user = $user_check;";
                            $result = mysqli_query($conn, $sql);
                            $data = mysqli_fetch_assoc($result);
                            echo $data ['total'];
                        ?>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Edit Profile</h2>
                        <form action="../Controller/savedata.php" method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" value="<?php echo $row['name']; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" value="<?php echo $row['email']; ?>"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signup" class="form-submit" value="Edit Profile"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/punix.png" alt="sign up image"></figure>
                        <a href="ChangePassword.php" class="signup-image-link">Change Password</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="py-5 bg-dark">
        <p class="m-0 text-center text-white">Copyright &copy; Punix Restaurant 2022</p>
    </footer> 
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>