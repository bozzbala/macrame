<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles/product.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <?php
    include 'header.php';
    include 'BLL/db.php';
    $result = mysqli_query($mysqli, "SELECT * FROM products");
    ?>
    <main>
        <section class="intro">
            <div class="intro-header">БОЛЬШОЙ АССОРТИМЕНТ ТОВАРОВ</div>
            <p>Всё что нужно для создания макраме</p>
            <a href="#">
                <div class="button-main">К ТОВАРАМ</div>
            </a>
        </section>

        <section class="products-wrapper">
            <div class="product-category">ШНУРЫ</div>
            <div class="products">
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="product">
                    <a href="/product.php?p=<?php echo $row['id']; ?>">
                    <div class="product-img"><img src="<?php echo "./db/". strtok($row['image_url'], " "); ?>"></div>
                    <div class="product-title"><?php echo $row['name'] ?></div>
                    <div class="product-price"><?php echo $row['price'] ?></div>
                    </a>
                    <div class="product-button">В КОРЗИНУ</div>
                </div>
                <?php } ?>
            </div>
        </section>
        <?
        mysqli_close($mysqli);
        ?>
    </main>
    <?php include 'footer.php' ?>
</body>

</html>