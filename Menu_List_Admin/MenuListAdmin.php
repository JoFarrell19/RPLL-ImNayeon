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
                            echo'<div class="edit_menu"><a href="../Edit_Menu/Edit_Menu.php?menu='.$row["id_menu"].'">Edit Menu</a></div>';
                            echo'<div class="delete_menu"><a href="../Controller/Edit_Food.php?menu='.$row["id_menu"].'">Delete Menu</a></div>';
                            // echo'<div href=""?id_menu='.$row["id_menu"].' class="edit_menu">Edit Menu</div>';
                            // echo'<div href=""?id_menu='.$row["id_menu"].' class="delete_menu">Delete Menu</div>';
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
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- partial -->
    <script src="./js/script.js"></script>

</body>

</html>