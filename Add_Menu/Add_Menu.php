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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Menu</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    <link rel="stylesheet" href="./style.css">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="../Main_Menu_Admin/MainMenu_Admin.php">Admin Punix Restaurant</a>
        </div>
    </nav>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Add Menu</h2>
                        <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="menu_name"></label>
                                <input type="text" name="menu_name" id="menu_name" placeholder="Menu Name" required />
                            </div>
                            <div class="form-group">
                                <label for="menu_description"></label>
                                <input type="text" name="menu_description" id="menu_description"
                                    placeholder="Menu Description" required />
                            </div>
                            <div class="form-group">
                                <label for="price"></label>
                                <input type="number" name="price" id="price" placeholder="Price (RP)" required />
                            </div>
                            <div class="form-group">
                                <label for="image_file"></label>
                                <input type="file" name="image" id="image" placeholder="Image" required />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit"
                                    value="Submit New Menu" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/punix.png" alt="sign up image"></figure>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "punix";

    // Membuat koneksi
    $conn = mysqli_connect($servername, $username, $password, $database);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = mysqli_real_escape_string($conn, $_POST['menu_name']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $description = mysqli_real_escape_string($conn, $_POST['menu_description']);


        $query = "SELECT * FROM menu WHERE name = '$name'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script type='text/javascript'>alert('Name Already Exist');</script>";
        } else {
            $image = $_FILES['image']['name'];
            $target = "../img/" . basename($image);
            $query = "INSERT INTO menu (name, price, description, image) VALUES ('$name', $price, '$description','$image')";
            mysqli_query($conn, $query);


            move_uploaded_file($_FILES['image']['tmp_name'], $target);

            echo "<script type='text/javascript'>alert('Success Added'); window.location.href='../Main_Menu_Admin/MainMenu_Admin.php';</script>";
        }

        mysqli_close($conn);
    }
    ?>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>