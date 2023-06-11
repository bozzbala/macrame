<?php
if (!isset($_COOKIE['macrame'])) {
    header("Location: /BLL/loginPage.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Admin</title>
    <style>
        .new-product {
            border: 1px solid rgba(0, 0, 0, 0.25);
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .table {
            border: 1px solid rgba(0, 0, 0, 0.25);
        }

        .orders-h1 {
            margin: 20px 0px;
        }
    </style>
    <?php include './inc/head.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col">
            <form method="POST" class="new-product" action="/BLL/newProduct.php" enctype="multipart/form-data">
                <h1>Добавить новый товар</h1>
                <div class="mb-3">
                    <label for="name" class="form-label">Название товара</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Цена</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <br>
                <div class="mb-3">
                    <label for="image_url" class="form-label">Фотографии</label>
                    <input class="form-control" type="file" id="image_url" name="upload[]" multiple="multiple" required>
                </div>
                <br>
                <div>Выберите категорию</div>
                <select for="category" class="form-select" aria-label="Default select example" name="category">
                    <option value="Шнуры" selected>Шнуры</option>
                    <option value="Наборы">Наборы</option>
                    <option value="Мастер-классы">Мастер-классы</option>
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>


            <?php
            include 'BLL/db.php';
            $result = mysqli_query($mysqli, "SELECT * FROM products");
            ?>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>В наличии</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo ($row['available'] ? 'Да' : 'Нет'); ?></td>
                        <td>
                            <form method="POST" action="/BLL/setAvailable.php">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <?php
                                if ($row['available']) {
                                    echo '<button type="submit" name="available_' . $row['id'] . '" value="0" class="btn btn-outline-primary">-</button>';
                                } else {
                                    echo '<button type="submit" name="available_' . $row['id'] . '" value="1" class="btn btn-outline-primary">+</button>';
                                }
                                ?>
                                <a href="/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-success">Изменить</a>
                                <a href="/BLL/deleteProduct.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-danger">Удалить</a>

                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>

                </tbody>
            </table>
            <?
            mysqli_close($mysqli);
            ?>
        </div>
        <div class="col-sm-6 col">
            <table class="table table-striped table-hover">
                <h1 class="orders-h1">Заказы</h1>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Почта</th>
                    <th scope="col">Корзина</th>
                    <th scope="col">Дата</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
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