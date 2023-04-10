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
        <link rel="stylesheet" href="CSS/HistoryOrderUser.css">
        <script src="js/HistoryOrderUser.js"></script>
        <title>History Order</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="../Main_Menu/index.html">Punix Restaurant</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" href="../Main_Menu/index.html">Main Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="../Menu_List/MenuList.php">Food Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="../Track_Order/TrackOrder.html">Track Order</a></li>
                        <li class="nav-item"><a class="nav-link active" href="../HistoryOrder/HistoryOrderUser.php">History Order</a></li>
                        <li class="nav-item"><a class="nav-link" href="../EditProfile/EditProfile.php">Edit Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="../Controller/logout.php">Logout</a></li>
                        </li>
                    </ul>
                    <form class="d-flex" action="../Shopping_Cart/Shopping_Cart.html">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    <div class ="bodymain">
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'><link rel="stylesheet" href="./style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
        <!-- Fonts referenced in mdbootstrap, moved up to reduce page load time -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css" rel="stylesheet"/>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="https://gensuiteqa.genalphacatalog.com/gensuite/css/ps/mdb.min.css?version=0707050300507050503" type='text/css'/>  
        <link rel="stylesheet" href="https://gensuiteqa.genalphacatalog.com/gensuite/css/ps/storefront.css?version=0707050300507050503" type='text/css'/>
        <link rel="stylesheet" href="https://gensuiteqa.genalphacatalog.com/gensuite/css/ps/autocomplete.css?version=0707050300507050503"/>
        <link rel="stylesheet" type="text/css" href="../css/ps/theme.css?version=0707050300507050503">
            

        <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

        <link href="//cdn.datatables.net/plug-ins/1.10.19/integration/font-awesome/dataTables.fontAwesome.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet"  type="text/css" href="https://gensuiteqa.genalphacatalog.com/gensuite/css/ps/orderhistory.css?version=0707050300507050503" />
        <div class="table-responsive pb-5">
            <table id="tbOrderHistory" class="table border ps-table w-100 mb-3">
				<thead>
                    <tr>
                        <th class="font-weight-bold py-2 border-0 ">ID Order</th>
						<th class="font-weight-bold py-2 border-0 ">Status</th>
                        <th class="font-weight-bold py-2 border-0 ">Date</th>
					</tr>
				</thead>
                <tbody>	
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "punix";

                    $conn = mysqli_connect($servername, $username, $password, $database);
                    $sql = "SELECT * FROM transactions
                            WHERE id_user = '$loggedin_id'";

                    $result = mysqli_query($conn, $sql);
                            
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {       
                            echo "<tr>";
                            echo "<td>" .$row["id_transaction"]. "</td>";
                            echo "<td>" .$row["status"]. "</td>";
                            echo "<td>" .$row["date"]. "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<script type='text/javascript'>alert('No Data.');</script>";
                    }                           
                ?>   
                </tbody>
			</table>
		</div>
    </div>
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Punix Restaurant 2022</p></div>
    </footer> 
    </body>
</html>