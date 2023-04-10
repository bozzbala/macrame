<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $files = $_FILES['upload'];

    $total_count = count($_FILES['upload']);
    $filenames = "";
    for ($i = 0; $i < $total_count; $i++) {
        $target_dir = "../db/";
        $input_str = trim(basename($_FILES["upload"]["name"][$i]));
        $str = preg_replace("/\s+/", "", $input_str);
        $target_file = $target_dir . $str;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["upload"]["tmp_name"][$i]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // if ($_FILES["upload"]["size"][$i] > 500000) {
        //     echo "Sorry, your file is too large.";
        //     $uploadOk = 0;
        // }

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["upload"]["tmp_name"][$i], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["upload"]["name"][$i])) . " has been uploaded.";
                $filenames .= preg_replace("/\s+/", "", $str) . " ";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    // Получаем данные из формы
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $description = mysqli_real_escape_string($mysqli, $_POST['description']);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);
    $category = mysqli_real_escape_string($mysqli, $_POST['category']);

    // Создаем SQL-запрос для добавления товара в базу данных
    $sql = "INSERT INTO `products` (`name`, `description`, `price`, `image_url`, `category`, `available`) 
            VALUES ('$name', '$description', '$price', '$filenames', '$category', 1)";

    // Выполняем запрос
    if (mysqli_query($mysqli, $sql)) {
        echo "Товар успешно добавлен в базу данных.";
    } else {
        echo "Ошибка: " . mysqli_error($mysqli);
    }

    // Закрываем соединение с базой данных
    mysqli_close($mysqli);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}