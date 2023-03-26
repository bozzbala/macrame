<?php
    if(!isset($_COOKIE['macrame'])) {
        header("Location: /BLL/loginPage.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col">
                <form class="new-product" action="/BLL/newProduct.php">
                    <h1>Добавить новый товар</h1>
                    <div class="mb-3">
                        <label for="name" class="form-label">Название товара</label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Цена</label>
                        <input type="text" class="form-control" id="price">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Описание</label>
                        <textarea class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Фотографии</label>
                        <input class="form-control" type="file" id="image_url" multiple>
                    </div>
                    <br>
                    <select for="category" class="form-select" aria-label="Default select example">
                        <option selected>Выберите категорию</option>
                        <option value="1">Шнуры</option>
                        <option value="2">Наборы</option>
                        <option value="3">Мастер-классы</option>
                     </select>
                    <br>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
                <?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'macrame';

// Подключаемся к базе данных
$mysqli = mysqli_connect($host, $user, $password, $dbname);
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

// Получаем данные из формы
$name = mysqli_real_escape_string($mysqli, $_POST['name']);
$description = mysqli_real_escape_string($mysqli, $_POST['description']);
$price = mysqli_real_escape_string($mysqli, $_POST['price']);
$image_url = mysqli_real_escape_string($mysqli, $_POST['image_url']);
$category = mysqli_real_escape_string($mysqli, $_POST['category']);

// Создаем SQL-запрос для добавления товара в базу данных
$sql = "INSERT INTO `товары` (`name`, `description`, `price`, `image_url`, `category`) 
        VALUES ('$name', '$description', '$price', '$image_url', '$category')";

// Выполняем запрос
if (mysqli_query($mysqli, $sql)) {
    echo "Товар успешно добавлен в базу данных.";
} else {
    echo "Ошибка: " . mysqli_error($mysqli);
}

// Закрываем соединение с базой данных
mysqli_close($mysqli);
?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Цена</th>
                            <th scope="col">В наличии</th>
                            <th scope="col">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Название товара</td>
                            <td>19000</td>
                            <td>Да</td>
                            <td>
                                <button type="button" class="btn btn-outline-success">Редактировать</button>
                                <button type="button" class="btn btn-outline-danger">Удалить</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Название товара</td>
                            <td>19000</td>
                            <td>Да</td>
                            <td>
                                <button type="button" class="btn btn-outline-success">Редактировать</button>
                                <button type="button" class="btn btn-outline-danger">Удалить</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Название товара</td>
                            <td>19000</td>
                            <td>Да</td>
                            <td>
                                <button type="button" class="btn btn-outline-success">Редактировать</button>
                                <button type="button" class="btn btn-outline-danger">Удалить</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Название товара</td>
                            <td>19000</td>
                            <td>Да</td>
                            <td>
                                <button type="button" class="btn btn-outline-success">Редактировать</button>
                                <button type="button" class="btn btn-outline-danger">Удалить</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Название товара</td>
                            <td>19000</td>
                            <td>Да</td>
                            <td>
                                <button type="button" class="btn btn-outline-success">Редактировать</button>
                                <button type="button" class="btn btn-outline-danger">Удалить</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
</body>

</html>