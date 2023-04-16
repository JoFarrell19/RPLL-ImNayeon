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
    <title>Edit Menu</title>
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

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "punix";

    $id_menu = $_GET['menu'];

    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * from menu WHERE id_menu = $id_menu";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);

    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="../Main_Menu_Admin/MainMenuAdmin.php">Admin Punix Restaurant</a>
        </div>
    </nav>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Edit Menu</h2>
                        <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="menu_name"></label>
                                <input type="text" name="menu_name" id="menu_name" placeholder="Menu Name"
                                    value="<?php echo $data["name"]; ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="description"></label>
                                <input type="text" name="description" id="description" placeholder="Menu Description"
                                    value="<?php echo $data["description"]; ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="price"></label>
                                <input type="number" name="price" id="price" placeholder="Price (RP)" value="<?php echo $data["price"]; ?>"
                                    required />
                            </div>
                            <div class="form-group">
                                <label for="image_file"></label>
                                <input type="file" name="image" id="image" placeholder="Image" required />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit"
                                    value="Submit Edit Menu" />
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

    if(isset($_POST["submit"])) {
    // Check if the name already exists in the menu table
    $menu_name = $_POST["menu_name"];
    $sql = "SELECT * FROM menu WHERE name='$menu_name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script type='text/javascript'>alert('Name Already Exist');</script>";
    } else {
        // Insert data into the menu table
        $price = $_POST["price"];
        $description = $_POST["description"];
        $image = $_FILES['image']['name'];
        $target_file = "../img/" . basename($image);

        // Move the file to the uploads directory
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        // Insert data into the menu table
        $sql = "UPDATE menu SET name = '$menu_name', price = '$price', description = '$description', image = '$image' WHERE id_menu = $id_menu";
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('Success Edited'); window.location.href='../Menu_List_Admin/MenuListAdmin.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Error');</script>";
        }
        }
    }
    ?>
    <footer class="py-5 bg-dark">
        <p class="m-0 text-center text-white">Copyright &copy; Punix Restaurant 2022</p>
    </footer>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>