<?php
// connect to the database
include "BLL/db.php"; 

// check if the form has been submitted
if (isset($_POST['submit'])) {
    // get the input values
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $available = isset($_POST['available']) ? 1 : 0;
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];
    $category = $_POST['category'];

    // update the product in the database
    $query = "UPDATE products SET name='$name', price=$price, available=$available, description='$description', image_url='$image_url', category='$category' WHERE id=$id";
    mysqli_query($conn, $query);

    // redirect back to the product list page
    header("Location: /admin.php");
    exit;
}

// check if the id parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // fetch the product from the database
    $query = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);

    // display the form for editing the product
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Product</title>
         <link rel="stylesheet" href="styles/edit.css">
    </head>     
    <body>
        <form method="POST" action="/edit.php">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $product['name']; ?>"><br>
            <label>Price:</label>
            <input type="number" name="price" value="<?php echo $product['price']; ?>"><br>
            <label>Description:</label>
            <textarea name="description"><?php echo $product['description']; ?></textarea><br>
            <label>Image URL:</label>
            <input type="text" name="image_url" value="<?php echo $product['image_url']; ?>"><br>
            <label>Category:</label>
            <select for="category" class="form-select" aria-label="Default select example" name="category">
                <option value="Шнуры" <?php if ($product['category'] == 'Шнуры') echo 'selected'; ?>>Шнуры</option>
                <option value="Наборы" <?php if ($product['category'] == 'Наборы') echo 'selected'; ?>>Наборы</option>
                <option value="Мастер-классы" <?php if ($product['category'] == 'Мастер-классы') echo 'selected'; ?>>Мастер-классы</option>
            </select><br>
            <label>Available:</label>
            <input type="checkbox" name="available" <?php if ($product['available']) echo "checked"; ?>><br>
            <input type="submit" name="submit" value="Save">
        </form>
    </body>
</html>
<?php
}
else {
    // redirect back to the product list page
    header("Location: /admin.php");
    exit;
}
