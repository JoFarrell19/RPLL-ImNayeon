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
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Checkout</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
      <a class="navbar-brand" href="../Main_Menu/index.php">Punix Restaurant</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
          class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
          <li class="nav-item"><a class="nav-link" href="Shopping_Cart.php">Back to Shopping Cart</a></li>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../img/punix.png" alt="" width="500" height="300">
      <h2>Checkout Form</h2>
    </div>

    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span class="badge badge-secondary badge-pill">
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
        </h4>
        <ul class="list-group mb-3">
          <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "punix";

            $conn = mysqli_connect($servername, $username, $password, $database);
            
            $sql = "SELECT menu.name, menu.price, detailed_carts.quantity 
            FROM detailed_carts 
            JOIN carts on detailed_carts.id_cart = carts.id_cart 
            JOIN menu on detailed_carts.id_menu = menu.id_menu 
            WHERE carts.id_user = $user_check;";
            $result = mysqli_query($conn, $sql) or die (mysqli_error());
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo ("<li class='list-group-item d-flex justify-content-between lh-condensed'>");
                echo ("<div>");
                echo ("<h6 class='my-0'>");
                echo $row ["name"];
                echo ("</h6>");
                echo ("<small class='text-muted'>");
                echo $row ["quantity"];
                echo ("</small>");
                echo ("</div>");
                echo ("<span class='text-muted'> Rp.");
                echo $row ["price"];
                echo ("</span>");
                echo ("</li>");
            }
          ?>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Shipping</h6>
            </div>
            <span class="text-muted">Rp. 10000</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total</span>
            <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $database = "punix";
  
              $conn = mysqli_connect($servername, $username, $password, $database);
              $sql = "SELECT SUM(menu.price * detailed_carts.quantity) + 10000 AS total FROM menu
                      JOIN detailed_carts on menu.id_menu = detailed_carts.id_menu
                      JOIN carts on detailed_carts.id_cart = carts.id_cart
                      WHERE carts.id_user = $user_check";
              $result = mysqli_query($conn, $sql);
              $data = mysqli_fetch_assoc($result);
              echo ("Rp. ".$data ['total']);
            ?>
          </li>
        </ul>
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Delivery Address</h4>
        <form class="needs-validation" method="POST" action="../Controller/checkoutCon.php" novalidate>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
              <label class="custom-control-label" for="credit">Cash</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
              <label class="custom-control-label" for="debit">QRIS</label>
            </div>
          </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit" name="checkout">Continue to Checkout</button>
        </form>
      </div>
    </div>
    
    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">Copyright &copy; Punix Restaurant 2022</p>
    </footer>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  <script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o"
    crossorigin="anonymous"></script>
  <script src="https://getbootstrap.com/docs/4.3/examples/checkout/form-validation.js"></script>
</body>

</html>