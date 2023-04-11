<?php
if (!isset($_COOKIE['macrame'])) {
    header("Location: /BLL/loginPage.php");
    exit;
}
// connect to the database
include "BLL/db.php";

function str_split_by_space($str)
{
    $result = array();
    $new_str = "";
    for ($i = 0; $i < strlen($str) - 1; $i++) {
        $new_str .= $str[$i];
        if ($str[$i + 1] == ' ') {
            array_push($result, trim($new_str));
            $new_str = "";
        }
    }
    return $result;
}

// check if the form has been submitted
if (isset($_POST['submit'])) {
    $files = $_FILES['upload'];
    $id = $_POST['id'];

    $getter = mysqli_query($conn, "SELECT image_url FROM products WHERE id='$id'");
    $getter = mysqli_fetch_assoc($getter);


    $total_count = count($_FILES['upload']['name']);
    $filenames = $getter['image_url'];
    for ($i = 0; $i < $total_count; $i++) {
        $target_dir = "./db/";
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
    // get the input values
    $name = $_POST['name'];
    $price = $_POST['price'];
    $available = isset($_POST['available']) ? 1 : 0;
    $description = $_POST['description'];
    $category = $_POST['category'];

    // update the product in the database
    $query = "UPDATE products SET name='$name', price=$price, available=$available, description='$description', image_url='$filenames', category='$category' WHERE id=$id";
    mysqli_query($conn, $query);

    // redirect back to the product list page
    header("Location: /admin.php");
    exit;
}

// check if the id parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // fetch the product from the database
    $query = "SELECT * FROM products WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);

    $image = str_split_by_space($product['image_url']);

    ?>
    <html>
    <head>
        <?php include './inc/head.php' ?>
        <title>Edit Product</title>
        <link rel="stylesheet" href="styles/edit.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
              crossorigin="anonymous">
    </head>
    <body>
    <form enctype="multipart/form-data" method="POST" action="/edit.php">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <div class="form-group">
            <label>Название:</label>
            <input type="text" name="name" value="<?php echo $product['name']; ?>" class="form-control"><br>
        </div>

        <div class="form-group">
            <label>Цена:</label>
            <input type="number" name="price" value="<?php echo $product['price']; ?>" class="form-control"><br>
        </div>

        <label>Описание:</label>
        <textarea rows="10" name="description" class="form-control"><?php echo $product['description']; ?></textarea><br>

        <label>Картинки:</label>
        <div>
            <?php
            for ($i = 0; $i < count($image); $i++) {
                ?>
                <div class="edit-img">
                    <img src="<?php echo "./db/" . $image[$i]; ?>">
                    <div><a href="/BLL/deleteProductImage.php?id=<?php echo $product['id'] . '&image=' . $i; ?>"
                            class="btn btn-outline-danger">Удалить</a></div>
                </div>
            <?php } ?>
        </div>

        <div class="mb-3">
            <label for="image_url" class="form-label">Добавить новые фотографии</label>
            <input class="form-control" type="file" id="image_url" name="upload[]" multiple="multiple">
        </div>

        <label>Категория:</label>
        <select for="category" class="form-select" aria-label="Default select example" name="category">
            <option value="Шнуры" <?php if ($product['category'] == 'Шнуры') echo 'selected'; ?>>Шнуры</option>
            <option value="Наборы" <?php if ($product['category'] == 'Наборы') echo 'selected'; ?>>Наборы</option>
            <option value="Мастер-классы" <?php if ($product['category'] == 'Мастер-классы') echo 'selected'; ?>>
                Мастер-классы
            </option>
        </select><br>

        <div class="form-check">
            <label>В наличии:</label>
            <input class="form-check-input" type="checkbox" name="available" <?php if ($product['available']) echo "checked"; ?>><br>
        </div>
        <input type="submit" name="submit" value="Сохранить" class="btn btn-success mt-4">

    </form>
    </body>
    </html>
    <?php
} else {
    // redirect back to the product list page
    header("Location: /admin.php");
    exit;
}
