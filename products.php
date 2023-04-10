<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="styles/product.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <?php
    session_start();
    include 'header.php';
    include 'BLL/db.php';
    $result = mysqli_query($mysqli, "SELECT * FROM products");
    $shnur = mysqli_query($mysqli, "SELECT * FROM products WHERE `category`='Шнуры'");
    $nabor = mysqli_query($mysqli, "SELECT * FROM products WHERE `category`='Наборы'");
    $master = mysqli_query($mysqli, "SELECT * FROM products WHERE `category`='Мастер-классы'");
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
    <div class="product-category" id="yarns">ШНУРЫ</div>
    <div class="products">
        <?php while($row = mysqli_fetch_assoc($shnur)) {
        if($row['available'] == 1){?>
            <div class="product">
                <a href="/product.php?p=<?php echo $row['id']; ?>">
                    <div class="product-img"><img src="<?php echo "./db/". strtok($row['image_url'], " "); ?>"></div>
                    <div class="product-title"><?php echo $row['name'] ?></div>
                    <div class="product-price"><?php echo $row['price'] ?></div>
                </a>
                <form method="POST" action="addtocart.php" class="product-form">
                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $row['image_url']; ?>">
                    <button type="submit" class="product-button">В КОРЗИНУ</button>
                </form>
            </div>
        <?php }} ?>
    </div>
    <div class="product-category" id="packs">Наборы</div>
    <div class="products">
        <?php while($row = mysqli_fetch_assoc($nabor)) {
            if($row['available'] == 1){?>
            <div class="product">
                <a href="/product.php?p=<?php echo $row['id']; ?>">
                    <div class="product-img"><img src="<?php echo "./db/". strtok($row['image_url'], " "); ?>"></div>
                    <div class="product-title"><?php echo $row['name'] ?></div>
                    <div class="product-price"><?php echo $row['price'] ?></div>
                </a>
                <form method="POST" action="addtocart.php" class="product-form">
                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $row['image_url']; ?>">
                    <button type="submit" class="product-button">В КОРЗИНУ</button>
                </form>
            </div>
        <?php }} ?>
    </div>
    <div class="product-category" id="master">Мастер-классы</div>
    <div class="products">
        <?php while($row = mysqli_fetch_assoc($master)) {
        if($row['available'] == 1){?>
            <div class="product">
                <a href="/product.php?p=<?php echo $row['id']; ?>">
                    <div class="product-img"><img src="<?php echo "./db/". strtok($row['image_url'], " "); ?>"></div>
                    <div class="product-title"><?php echo $row['name'] ?></div>
                    <div class="product-price"><?php echo $row['price'] ?></div>
            </div>
                    <form method="POST" action="addtocart.php" class="product-form">
                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                    <input type="hidden" name="product_image" value="<?php echo "./db/". strtok($row['image_url'], " "); ?>">
                    <button type="submit" class="product-button">В КОРЗИНУ</button>
                </form>
            </div>
        <?php }} ?>
    </div>

</section>

        <?
        mysqli_close($mysqli);
        
        ?>
    </main>
    <?php include 'footer.php' ?>
</body>

</html>