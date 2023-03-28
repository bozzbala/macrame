<header>
    <div id="sidebar">
        <div class="sidebar-close" onclick="sidebarToggle()"><i class="fas fa-times"></i></div>
        <div class="sidebar-items">
            <div class="sidebar-item"><a href="/">ГЛАВНАЯ</a></div>
            <div class="sidebar-item"><a href="products.php">ВИДЕОУРОКИ и МАСТЕР-КЛАССЫ</a></div>
            <div class="sidebar-item"><a href="store.php">МАГАЗИН</a></div>
            <div class="sidebar-item"><a href="products.php">НЕОБХОДИМЫЕ МАТЕРИАЛЫ</a></div>
            <div class="sidebar-item"><a href="products.php">ОБО МНЕ</a></div>
        </div>
        <div class="sidebar-social-links">  
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    <div class="header-wrapper">
        <div class="logo" onclick="location.href='/'">
            <img src="./images/logo.png">
            <div>NAZVANIE</div>
        </div>
        <nav>
            <div class="menu"><a href="products.php">ВИДЕОУРОКИ</a></div>
            <div class="menu"><a href="store.php">МАГАЗИН</a></div>
            <div class="menu"><a href="products.php">НЕОБХОДИМЫЕ МАТЕРИАЛЫ</a></div>
            <div class="menu"><a href="#">ОБО МНЕ</a></div>
            <div class="menu"><a href="#"><img src="./images/cart.png"></a></div>
        </nav>
        <div class="sidebar-open" onclick="sidebarToggle()"><i class="fas fa-bars"></i></i></div>
    </div>
</header>
<script>
    let isOpen = false;
    const sidebarToggle = () => {
        if(isOpen){
            document.getElementById("sidebar").style.width = "0px";
            isOpen = false;
        }
        else{
            if(window.innerWidth > 310){
                document.getElementById("sidebar").style.width = "300px";
            }
            else{
                document.getElementById("sidebar").style.width = "100%";
            }
            isOpen = true;
        }
    }
</script>