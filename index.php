<?php
session_start();
require_once 'define.php';
global $conn;
include __DB_DIR__ . "/db.php";
?>
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
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>


</head>

<body>
<?php include './inc/header.php' ?>

<?php require_once "./vendor/autoload.php"; ?>
<main>
    <?php require_once __INCLUDES_DIR__ . "/routes.php"; ?>
</main>
<?php
include './inc/footer.php';
mysqli_close($conn);
?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script>
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
            var x = (slide.target + flkty.x) * -1 / 3;
            image.style.backgroundPosition = x + 'px';
        });
    });


</script>
</body>
</html>