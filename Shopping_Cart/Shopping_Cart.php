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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CodeHim">
    <title>Shopping Cart</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
      
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
	<!-- Demo CSS (No need to include it into your project) -->
	<link rel="stylesheet" href="css/demo.css">
  
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="../Main_Menu/index.php">Punix Restaurant</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            <li class="nav-item"><a class="nav-link" href="../Menu_List/MenuList.php">Back to Food Menu</a></li>
            </li>
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
      </div>
    </nav>
 <!-- <header class="intro">
 <h1>JavaScript/Vue JS Shopping Cart Example</h1>
 <p>A simple Vue JS shopping cart.</p>

 <div class="action">
 <a href="https://www.codehim.com/collections/javascript-shopping-cart-examples-with-demo/" title="Back to download and tutorial page" class="btn back">Back to Tutorial</a>
 </div>
 </header> -->
  
      
 <main>
     <!-- Start DEMO HTML (Use the following code into your project)-->
<div class="shopping-cart-wrapper">
  <table class="table is-fullwidth shopping-cart">
    <thead>
      <tr>
        <th><abbr title="Position"></abbr></th>
        <th>Item</th>
        <th>Price</th>
        <th>Quantity</th>
      </tr>
    </thead>
    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "punix";
        
      $conn = new mysqli($servername, $username, $password, $dbname);

      $sql = "SELECT detailed_carts.quantity, menu.name, menu.price
              FROM detailed_carts
              JOIN carts ON carts.id_cart = detailed_carts.id_cart
              JOIN menu ON menu.id_menu = detailed_carts.id_menu
              WHERE carts.id_user = '$loggedin_id';";

      $result = mysqli_query($conn, $sql);
                            
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {       
          echo "<tr>";
          echo "<td></td>";
          echo "<td>" .$row["name"]. "</td>";
          echo "<td>" .$row["price"]. "</td>";
          echo "<td>" .$row["quantity"]. "</td>";
          echo "</tr>";
        }
      } else {
        echo "<script type='text/javascript'>alert('No Data.');</script>";
      }             
    ?>
  </table>
  <button type="submit" onclick="window.location.href='../Checkout/Checkout.php'" class="checkout">Checkout</button>
     <!-- END EDMO HTML (Happy Coding!)-->
 </main>
 
      
 <footer class="py-5 bg-dark">
  <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Punix Restaurant 2022</p></div>
</footer>
  
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script> 
  </body>
</html>