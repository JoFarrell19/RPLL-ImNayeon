<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu List</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <!-- partial:index.partial.html -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <div id="wrapper">
        <div class="cart-icon-top">
        </div>

        <div class="cart-icon-bottom">
        </div>

        <div id="checkout">
            <a href="../Shopping_Cart/Shopping_Cart.html">CHECKOUT</a>
        </div>

        <!-- <div id="info">
            <p class="i1">Add to cart interaction prototype by Virgil Pana</p>
            <p>    Follow me on <a href="https://dribbble.com/virgilpana" style="color:#ea4c89" target="_blank">Dribbble</a> | <a style="color:#2aa9e0" href="https://twitter.com/virgil_pana" target="_blank">Twitter</a></p>
        </div> -->


        <!-- <div class="menu-title">Punix Restaurant</div> -->


        <div id="header">
            <ul>
                <li><a href="../Main_Menu/Main_Menu.html">Home</a></li>
            </ul>
        </div>

        <div id="sidebar">
            <h3>CART</h3>
            <div id="cart">
                <span class="empty">No items in cart.</span>
            </div>

            <h3>CATEGORIES</h3>
            <div class="checklist categories">
                <ul>
                    <li><a href=""><span></span>Main Course</a></li>
                    <li><a href=""><span></span>Snack</a></li>
                    <li><a href=""><span></span>Beverages</a></li>
                </ul>
            </div>
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
                            echo'<div class="add_to_cart">Add to cart</div>';
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