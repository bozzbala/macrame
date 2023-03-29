<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles/product.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
<?php
include 'header.php';
include 'BLL/db.php';

function str_split_by_space($str)
{
    $result = array();
    $new_str = "";
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i + 1] == ' ') {
            $new_str .= $str[$i];
            array_push($result, trim($new_str));
            $new_str = "";
        } else {
            $new_str .= $str[$i];
        }
    }
    return $result;
}

$id = $_GET['p'];
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE `id`='$id'");
$row = mysqli_fetch_assoc($result);
$category = $row['category'];
$desc = $row['description'];
$title = $row['name'];
$price = $row['price'];
$available = $row['available'];
$image = str_split_by_space($row['image_url']);
?>
<main>
    <div class="prod">
        <div class="prod-left">
            <img src="<?php echo "./db/" . $image[0]; ?>">
        </div>
        <div class="prod-right">
            <div class="prod-category"><?php echo $category; ?></div>
            <div class="prod-title"><?php echo $title; ?></div>
            <div class="prod-price"><?php echo $price; ?></div>
            <h2>ОПИСАНИЕ</h2>
            <div class="prod-desc">
                <?php echo nl2br($desc); ?>
            </div>
        </div>
    </div>
    <div class="prod">
        <div class="prod-left">
            <?php if (count($image) > 1) {
                for ($i = 1; $i < count($image); $i++) {
                    ?>
                    <img src="<?php echo "./db/" . $image[$i]; ?>">
                <?php }
            }?>
        </div>
    </div>
    <?
    mysqli_close($mysqli);
    ?>
</main>
<?php include 'footer.php' ?>
</body>

</html>