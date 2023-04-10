<?php include 'BLL/db.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Макраме изделия</title>
	<link href="style.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/012beec9f6.js" crossorigin="anonymous"></script>
    <link href="styles/slider.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


</head>

<body>
	<?php include 'header.php' ?>
	<main>
        <div class="hero-slider" data-carousel>
            <div class="carousel-cell" style="background-image: url('images/intro.png');">
                <div class="overlay"></div>
                <div class="inner">
                    <h3 class="subtitle">Текст</h3>
                    <h2 class="title">Текст</h2>
                    <a href="#" class="btn">подробнее</a>
                </div>
            </div>

            <div class="carousel-cell" style="background-image: url('https://cdn.shopify.com/s/files/1/0587/2602/3308/products/MacrameWallHangingPatternBeginnertoIntermediateFlowerChain.png?v=1657297897&width=1946');">
                <div class="overlay"></div>
                <div class="inner">
                    <h3 class="subtitle">Экология</h3>
                    <h2 class="title">Сохранение природы - залог жизни на планете!</h2>
                    <a href="#" class="btn">подробнее</a>
                </div>
            </div>

            <div class="carousel-cell" style="background-image: url('images/intro.png');">
                <div class="overlay"></div>
                <div class="inner">
                    <h3 class="subtitle">Экология</h3>
                    <h2 class="title">Природа не нуждается в нас, но мы нуждаемся в ней!</h2>
                    <a href="#" class="btn">подробнее</a>
                </div>
            </div>
            <div class="hero-slider" data-carousel>
                <div class="carousel-cell" style="background-image: url('images/intro.png');">
                    <div class="overlay"></div>
                    <div class="inner">
                        <h3 class="subtitle">Экология</h3>
                        <h2 class="title">Чистый воздух, чистая вода, чистая земля - здоровье человека!</h2>
                        <a href="#" class="btn">подробнее</a>
                    </div>
                </div>
            </div>
        </div>

		<div class="section-name">КАТЕГОРИИ</div>

		<section class="categories">
			<a href="/products.php">
				<div class="category">
					<div class="category-name">НЕОБХОДИМЫЕ МАТЕРИАЛЫ</div>
					<div class="category-button">ОТКРЫТЬ</div>
				</div>
			</a>
			<a href="/store.php">
				<div class="category">
					<div class="category-name">МАГАЗИН</div>
					<div class="category-button">ОТКРЫТЬ</div>
				</div>
			</a>
			<a href="/products.php#master">
				<div class="category">
					<div class="category-name">ВИДЕОУРОКИ И МАСТЕР-КЛАССЫ</div>
					<div class="category-button">ОТКРЫТЬ</div>
				</div>
			</a>
		</section>

		<div class="section-name">МОИ РАБОТЫ</div>
		<section class="works">
			<div class="work">
				<img src="./images/work.jpg" alt="https://www.instagram.com/assel_luxmacrame/">
			</div>
			<div class="work">
				<img src="./images/work.jpg" alt="https://www.instagram.com/assel_luxmacrame/">
			</div>
			<div class="work">
				<img src="./images/work.jpg" alt="https://www.instagram.com/assel_luxmacrame/">
			</div>
			<div class="work">
				<img src="./images/work.jpg" alt="https://www.instagram.com/assel_luxmacrame/">
			</div>
			<div class="work">
				<img src="./images/work.jpg" alt="https://www.instagram.com/assel_luxmacrame/">
			</div>
			<div class="work">
				<img src="./images/work.jpg" alt="https://www.instagram.com/assel_luxmacrame/">
			</div>
		</section>

        <section class=""

	</main>

	<?php include 'footer.php'?>

    <script>
        var options = {
            accessibility: true,
            prevNextButtons: true,
            pageDots: true,
            setGallerySize: false,
            arrowShape: {
                x0: 10,
                x1: 60,
                y1: 50,
                x2: 60,
                y2: 45,
                x3: 15
            }
        };

        let carousel = document.querySelector('[data-carousel]');
        let slides = document.getElementsByClassName('carousel-cell');
        let flkty = new Flickity(carousel, options);

        flkty.on('scroll', function () {
            flkty.slides.forEach(function (slide, i) {
                var image = slides[i];
                var x = (slide.target + flkty.x) * -1/3;
                image.style.backgroundPosition = x + 'px';
            });
        });

    </script>
</body>
</html>