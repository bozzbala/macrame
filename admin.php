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
                        <label for="exampleInputEmail1" class="form-label">Название товара</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Цена</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Фотографии</label>
                        <input class="form-control" type="file" id="formFileMultiple" multiple>
                    </div>
                    <br>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Выберите категорию</option>
                        <option value="1">Шнуры</option>
                        <option value="2">Наборы</option>
                        <option value="3">Мастер-классы</option>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
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