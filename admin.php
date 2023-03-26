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
            <form method="POST" class="new-product" action="/BLL/newProduct.php">
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
        <input class="form-control" type="file" id="image_url" name="image_url" multiple>
    </div>
    <br>
    <select for="category" class="form-select" aria-label="Default select example" name="category">
        <option selected>Выберите категорию</option>
        <option value="1">Шнуры</option>
        <option value="2">Наборы</option>
        <option value="3">Мастер-классы</option>
    </select>
    <br>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>


<?php
include 'BLL/db.php';
$result = mysqli_query($mysqli, "SELECT * FROM products");

// Вывод таблицы
echo '<table class="table table-striped table-hover">';
echo '<thead><tr><th>#</th><th>Название</th><th>Цена</th><th>В наличии</th><th>Действие</th></tr></thead>';
echo '<tbody>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<th scope="row">' . $row['id'] . '</th>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['price'] . '</td>';
    echo '<td>' . ($row['available'] ? 'Да' : 'Нет') . '</td>';
    echo '<td>';
    echo '<form method="POST" action="setAvailable.php">';
echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
if ($row['available']) {
    echo '<button type="submit" name="available_' . $row['id'] . '" value="0" class="btn btn-outline-primary">-</button>';
} else {
    echo '<button type="submit" name="available_' . $row['id'] . '" value="1" class="btn btn-outline-primary">+</button>';
}
    echo ' '; 
    echo '<button type="button" class="btn btn-outline-success">изменить</button>';
    echo ' '; 
    echo '<button type="button" class="btn btn-outline-danger">Удалить</button>';

  
    echo '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';

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
</body>

</html>