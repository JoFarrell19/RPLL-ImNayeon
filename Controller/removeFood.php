<?php    
    if(isset($_POST['removeFood'])) {
        $id = $GET['id'];

        include("dbcon.php");

        $result = mysqli($mysqli, "DELETE FROM users WHERE id=$id");

        echo "Food Deleted successfully. <a href='#'>Main Menu</a>";
    }
?>