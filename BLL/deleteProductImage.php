<?php
if (!isset($_COOKIE['macrame'])) {
    header("Location: /BLL/loginPage.php");
    exit;
}
include "db.php";

function str_split_by_space($str)
{
    $result = array();
    $new_str = "";
    for ($i = 0; $i < strlen($str) - 1; $i++) {
        $new_str .= $str[$i];
        if ($str[$i + 1] == ' ') {
            array_push($result, trim($new_str));
            $new_str = "";
        }
    }
    return $result;
}

// check if the form has been submitted
if (isset($_GET['id']) && isset($_GET['image'])) {
    $id = $_GET['id'];
    $image = $_GET['image'];


    // fetch the product from the database
    $query = "SELECT image_url FROM products WHERE id=$id";
    $result = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_assoc($result);
    $image_url = str_split_by_space($row['image_url']);
    $file_pointer = "../db/" . $image_url[$image];
    unlink($file_pointer);
    unset($image_url[$image]);
    $image_str = implode(" ", $image_url) . " ";
    $newQ = "UPDATE products SET image_url = '$image_str' WHERE id='$id'";
    mysqli_query($mysqli, $newQ);

    mysqli_close($mysqli);
    // redirect back to the product list page
    header("Location: /edit.php?id=" . $id);
    exit;
}

?>