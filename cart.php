<?php
include_once "BLL/db.php";
session_start();
$cart_items = !empty($_SESSION['cart']) ? $_SESSION['cart'] : array();
$total_price = 0;

if (!empty($cart_items)) {
    $cart_ids = implode(',', array_keys($cart_items));
    $query = "SELECT * FROM products WHERE id IN ($cart_ids)";
    $result = mysqli_query($conn, $query);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($products as $product) {
        $quantity = $cart_items[$product['id']]['quantity'];
        $subtotal = $quantity * $product['price'];
        $total_price += $subtotal;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './inc/head.php' ?>
    <title>Корзина</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/012beec9f6.js" crossorigin="anonymous"></script>
</head>

<body>

        <div class="container mt-5">
            <h1><a href="/products.php" style="text-decoration: none">Назад</a></h1>
            <h1>Корзина</h1>
        <?php if (empty($cart_items)) { ?>
            <p>Ваша корзина пуста.</p>
        <?php } else { ?>
        <section class="h-100 h-custom">
            <div class="h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Изображение</th>
                                    <th>Наименование товара</th>
                                    <th>Количество</th>
                                    <th>Цена</th>
                                    <th>Итого</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($products as $product) { ?>
                                    <tr>
                                        <th scope="row" class="border-bottom-0">
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo "./db/" . strtok($product['image_url'], " "); ?>" class="img-fluid rounded-3"
                                                     style="width: 120px;" alt="Фотография товара">
                                            </div>
                                        </th>
                                        <td class="align-middle border-bottom-0">
                                            <p class="mb-0" style="font-weight: 500;"><?php echo $product['name']; ?></p>
                                        </td>
                                        <td class="align-middle border-bottom-0">
                                            <form method="post" action="BLL/update_cart.php" id="updateForm">
                                                <div class="d-flex flex-row">
                                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                                    <button type="submit"  class="btn btn-link px-2" name="action" value="decrement">
                                                        <i class="fas fa-minus"></i>
                                                    </button>

                                                    <input id="form1" min="0" name="quantity" value="<?php echo $cart_items[$product['id']]['quantity']; ?>" type="number"
                                                           class="form-control form-control-sm" style="width: 50px;" />

                                                    <button type="submit" class="btn btn-link px-2" name="action" value="increment">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="align-middle border-bottom-0">
                                            <p class="mb-0" style="font-weight: 500;"><?php echo $product['price']; ?></p>
                                        </td>
                                        <td class="align-middle border-bottom-0">
                                            <p class="mb-0" style="font-weight: 500;"><?php echo $cart_items[$product['id']]['quantity'] * $product['price']; ?></p>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
                            <div class="card-body p-4">

                                <div class="row">
                                    <div class="col col-sm-4">

                                        <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                                            <p class="mb-2">Общая стоимость</p>
                                            <p class="mb-2"><?php echo $total_price; ?></p>
                                        </div>
                                        <form method="post" action="checkout.php">
                                        <button type="submit" class="btn btn-primary btn-block btn-lg">
                                            <div class="d-flex justify-content-between">
                                                <span>Оформить заказ</span>
                                            </div>
                                        </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
<?php } ?>
        </div>
        <script>
            // Получаем позицию прокрутки при загрузке страницы
            var scrollPosition = 0;
            window.onload = function() {
                scrollPosition = sessionStorage.getItem('scrollPosition');
                if (scrollPosition !== null) {
                    window.scrollTo(0, scrollPosition);
                    sessionStorage.removeItem('scrollPosition');
                }
            };

            // Сохраняем позицию прокрутки перед перенаправлением
            window.onbeforeunload = function() {
                sessionStorage.setItem('scrollPosition', window.pageYOffset);
            };
        </script>
</body>

</html>