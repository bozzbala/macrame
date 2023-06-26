<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include './inc/head.php' ?>
        <title>Обо мне</title>
        <link href="styles/aboutme.css" rel="stylesheet" type="text/css">
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
                    <h3 class="subtitle">Макраме</h3>
                    <h2 class="title">искусство узлов</h2>
                    <a href="#" class="btn">подробнее</a>
                </div>
            </div>

            <div class="carousel-cell" style="background-image: url('images/slider_3.jpg');">
                <div class="overlay"></div>
                <div class="inner">
                    <h3 class="subtitle">Макраме</h3>
                    <h2 class="title">способ создавать красивые вещи своими руками</h2>
                    <a href="#" class="btn">подробнее</a>
                </div>
            </div>

            <div class="carousel-cell" style="background-image: url('images/slider_2.jpg');">
                <div class="overlay"></div>
                <div class="inner">
                    <h3 class="subtitle">Макраме</h3>
                    <h2 class="title">удивительный способ выразить свою творческую натуру</h2>
                    <a href="#" class="btn">подробнее</a>
                </div>
            </div>
            <div class="hero-slider" data-carousel>
                <div class="carousel-cell" style="background-image: url('images/slider_4.jpg');">
                    <div class="overlay"></div>
                    <div class="inner">
                        <h3 class="subtitle">Макраме</h3>
                        <h2 class="title">увлекательное хобби, которое может стать источником вдохновения и творческого развития</h2>
                        <a href="#" class="btn">подробнее</a>
                    </div>
                </div>
            </div>
        </div>


  <section class="about-me">
    <img src="../images/assel.jpg" alt="Асель в мастерской">
    <p>Я уже несколько лет занимаюсь макраме. Это не просто хобби, но и моя страсть. Каждый раз, когда я начинаю создавать что-то новое, я погружаюсь в свой мир, полный красок и форм. Я использую различные материалы и техники, чтобы создавать уникальные работы, которые подойдут для любого интерьера.</p>
    <p>Я считаю, что каждый может научиться макраме, даже если у вас нет творческого опыта. Мои уроки основаны на простых техниках и понятных инструкциях. Я убеждена, что макраме может стать вашим новым любимым хобби, которое позволит вам расслабиться и проявить свою креативность.</p>
    <a href="#" class="btn">Записаться на уроки</a>
  </section>
</main>

        <?php include './inc/footer.php' ?>
    </body>
    <footer>
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
</footer>
</html>