<?php
if (!isset($_COOKIE['macrame'])) {
    header("Location: /BLL/loginPage.php");
    exit;
}
include_once "db.php";
 // check if the form has been submitted
 if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // fetch the product from the database
    $query = "DELETE FROM products WHERE id=$id";
    mysqli_query($conn, $query);
    // redirect back to the product list page
    header("Location: /admin.php");
    exit;
}

?>