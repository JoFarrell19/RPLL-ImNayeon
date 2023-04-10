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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu List</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
</head>

<body>

    <!-- partial:index.partial.html -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <div id="wrapper">

        <!-- <div id="info">
            <p class="i1">Add to cart interaction prototype by Virgil Pana</p>
            <p>    Follow me on <a href="https://dribbble.com/virgilpana" style="color:#ea4c89" target="_blank">Dribbble</a> | <a style="color:#2aa9e0" href="https://twitter.com/virgil_pana" target="_blank">Twitter</a></p>
        </div> -->


        <!-- <div class="menu-title">Punix Restaurant</div> -->


        <div id="header">
            <ul>
                <li><a href="../Main_Menu/index.php">Main Menu</a></li>
                <li><a href="../Menu_List/MenuList.php">Food Menu</a></li>
                <li><a href="../Track_Order/TrackOrder.php">Track Order</a></li>
                <li><a href="../HistoryOrder/HistoryOrderUser.php">History Order</a></li>
                <li><a href="../EditProfile/EditProfile.php">Edit Profile</a></li>
                <li><a href="../Controller/logout.php">Logout</a></li>
            </ul>
        </div>

        <div id="sidebar">
            <form class="d-flex" action="../Shopping_Cart/Shopping_Cart.php">
                <button class="btn btn-outline-dark" type="submit">
                <i class="bi-cart-fill me-1"></i>
                Cart
                <span class="badge bg-dark text-white ms-1 rounded-pill">
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "punix";
                    
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    $sql = "SELECT COUNT(detailed_carts.id_detailed_cart) AS total 
                            FROM detailed_carts 
                            JOIN carts on detailed_carts.id_cart = carts.id_cart
                            WHERE carts.id_user = '$loggedin_id';";
                    $result = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_assoc($result);
                    echo $data ['total'];
                ?> 
                </span>
                </button>
            </form>
        </div>

        <div id="grid-selector">
            <div id="grid-menu">
                View:
                <ul>
                    <li class="largeGrid"><a href=""></a></li>
                    <li class="smallGrid"><a class="active" href=""></a></li>
                </ul>
            </div>
        </div>

        <div id="grid">

            <?php
			include "../Controller/dbcon.php";	
					
			// if(isset($_POST["sort"])){
			// 	$category = $_POST['category'];
			// 	    if($category == "All"){
			// 			$sql="SELECT * FROM menu";
			// 		}else{
			// 			$sql="SELECT * FROM menu WHERE category='$category'";	
			// 		}
			// }else{
				$sql="SELECT * FROM menu";
			// }
					
			$result = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($result)) {

                    echo'<div class="product">';
                        echo'<div class="info-large">';
                            echo'<h4>'.$row["name"].'</h4>';
                        // echo'<div class="sku">';
                        //     echo'Main Course'; untuk CATEGORY
                        // echo'</div>';

                        echo'<div class="price-big">';
                            echo'<span> </span>'.$row["price"];
                        echo'</div>';

                        echo'<h3>Description</h3>';
                        echo'<div class="colors-large">';
                            echo'<p>'.$row["description"].'</p>';
                        echo'</div>';
                    echo'</div>';

                    echo'<div class="make3D">';
                        echo'<div class="product-front">';
                            echo'<div class="shadow"></div>';
                            echo'<img src="../img/'.$row["image"].'" alt="Menu 1" />';
                            echo'<div class="image_overlay"></div>';
                            echo'<div class="add_to_cart"><a href="../Controller/insert_data.php?menu='.$row["id_menu"].'">Add to cart</a></div>';
                            echo'<div class="view_gallery">Menu Description</div>';
                            echo'<div class="stats">';
                                echo'<div class="stats-container">';
                                    echo'<span class="product_name">'.$row["name"].'</span>';
                                    echo'<span class="product_price">'.$row["price"].'</span>';
                                    // echo'<p>Main Course</p>';

                                    echo'<div class="product-options">';
                                        echo'<strong>Description</strong>';
                                        echo'<span>'.$row["description"].'</span>';
                                    echo'</div>';
                                echo'</div>';
                            echo'</div>';
                        echo'</div>';

                    echo'<div class="product-back">';
                    echo'<div class="shadow"></div>';
                        echo'<div class="carousel">';
                        echo'<ul class="carousel-container">';
                            echo'<li><img src="../img/'.$row["image"].'" alt="Menu 1" /></li>';
                                echo'</ul>';
                            echo'<div class="arrows-perspective">';
                            echo'<div class="carouselPrev">';
                                echo'<div class="y"></div>';
                                    echo'<div class="x"></div>';
                                    echo'</div>';
                                echo'<div class="carouselNext">';
                                echo'<div class="y"></div>';
                                    echo'<div class="x"></div>';
                                echo'</div>';
                            echo'</div>';
                        echo'</div>';
                        echo'<div class="flip-back">';
                            echo'<div class="cy"></div>';
                            echo'<div class="cx"></div>';
                            echo'</div>';
                        echo'</div>';
                    echo'</div>';
                // echo'</div>';
            echo'</div>';
            }


            ?>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- partial -->
    <script src="./js/script.js"></script>

</body>

</html>