<?php

include 'BLL/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title ?></title>
    <link href="styles/product.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
<?php
include './inc/header.php';

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
<?php include './inc/footer.php' ?>
</body>

</html>