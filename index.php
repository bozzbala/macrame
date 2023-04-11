<?php include 'BLL/db.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include './inc/head.php' ?>
	<title>Макраме изделия</title>
	<link href="style.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/012beec9f6.js" crossorigin="anonymous"></script>
    <link href="styles/slider.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>


</head>

<body>
	<?php include './inc/header.php' ?>
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
				<div class="category" style="background-image: url('data:image/jpeg;base64,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')">
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

	</main>
    <div class="section-name">ОТЗЫВЫ</div>
    <div class="slider">
        <div><img src="./otzyvy/1.jpg"></div>
        <div><img src="./otzyvy/2.jpg"></div>
        <div><img src="./otzyvy/3.jpg"></div><div><img src="./otzyvy/1.jpg"></div>
        <div><img src="./otzyvy/2.jpg"></div>
        <div><img src="./otzyvy/3.jpg"></div><div><img src="./otzyvy/1.jpg"></div>
        <div><img src="./otzyvy/2.jpg"></div>
        <div><img src="./otzyvy/3.jpg"></div>
    </div>

	<?php include './inc/footer.php' ?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
        // $(document).ready(function(){
        //     $('.slider').slick({
        //         dots: true,
        //         autoplay: false,
        //         autoplaySpeed: 2000,
        //         infinite: true,
        //         speed: 500,
        //         slidesToShow: 1,
        //         slidesToScroll: 1
        //     });
        // });
        $('.slider').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            autoplay: true,
            autoplaySpeed: 3000,
            infinite: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>
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