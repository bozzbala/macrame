<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles/product.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    include 'header.php';
    include 'BLL/db.php';

    $id = $_GET['p'];
    $result = mysqli_query($mysqli, "SELECT * FROM products WHERE `id`='$id'");
    $row = mysqli_fetch_assoc($result);
    $category = $row['category'];
    $desc = $row['description'];
    $title = $row['name'];
    $price = $row['price'];
    $available = $row['available'];
    $image = $row['image_url'];

    ?>
    <main>
        <div class="prod">
            <div class="prod-left">
                <img src="<?php echo "./db/" . $image; ?>">
            </div>
            <div class="prod-right">
                <div class="prod-category"><?php echo $category; ?></div>
                <div class="prod-title"><?php echo $title; ?></div>
                <div class="prod-price"><?php echo $price; ?></div>
                <h2>ОПИСАНИЕ</h2>
                <div class="prod-desc">
                    <?php echo $desc; ?>
                </div>
            </div>
        </div>
        <div class="prod">
            <div class="prod-left">
                <img src="./images/product.png">
                <img src="./images/product.png">
            </div>
        </div>
    </main>
    <?php include 'footer.php' ?>
</body>

</html>