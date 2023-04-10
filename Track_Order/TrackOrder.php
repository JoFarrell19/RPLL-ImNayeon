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
        <div class="title">Purchase Reciept</div>
        <div class="info">
            <div class="row">
                <div class="col-5 pull-right">
                    <span id="heading">Order No.</span><br>
                    <span id="details">012j1gvs356c</span>
                </div>
            </div>
        </div>
        <div class="pricing">
            <div class="row">
                <div class="col-9">
                    <span id="name">BEATS Solo 3 Wireless Headphones</span>
                </div>
                <div class="col-3">
                    <span id="price">&pound;299.99</span>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <span id="name">Shipping</span>
                </div>
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
                WHERE carts.id_user = 1;";
                $result = mysqli_query($conn, $sql) or die(mysqli_error());
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo ("<div class='col-9'>");
                    echo ("<span id='name'>".$row ["name"]."</span>");
                    echo ("</div>");
                    echo ("<div class='col-3'>");
                    echo ("<span id='price' Rp. >".$row ["price"]."</span>");
                    echo ("</div>");
                }
                ?>
                <div class="row">
                    <div class="col-9">
                        <span id="name">Shipping</span>
                    </div>
                    <div class="col-3">
                        <span id="price">Rp. 10000</span>
                    </div>
                </div>
            </div>
            <div class="total">
                <div class="row">
                    <div class="col-9"></div>
                    <div class="col-3"><big>&pound;262.99</big></div>
                </div>
            </div>
            <div class="tracking">
                <div class="title">Tracking Order</div>
            </div>
            <!-- <div class="progress-track">
                <ul id="progressbar">
                    <li class="step0 active " id="step1">Ordered</li>
                    <li class="step0 active text-center" id="step2">Shipped</li>
                    <li class="step0 active text-right" id="step3">On the way</li>
                    <li class="step0 text-right" id="step4">Delivered</li>
                </ul>
            </div> -->
            <div class="footer">
                <div class="row">
                    <div class="col-10"><a href="#">Back</a></div>
                </div>
            </div>
        </div>
</body>

</html>