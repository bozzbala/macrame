<?php
$latte = new Latte\Engine;
// каталог кэша
$latte->setTempDirectory('./cache/latte');
function str_split_by_space($str)
{
    $result = array();
    $new_str = "";
    for ($i = 0; $i < strlen($str)-1; $i++) {
        $new_str .= $str[$i];
        if($str[$i + 1] == ' ') {
            array_push($result, trim($new_str));
            $new_str = "";
        }
    }
    return $result;
}

$id = $_GET['p'];
$result = db_query("SELECT * FROM products WHERE `id`='$id'");
$row = db_fetch_assoc($result);
$image = str_split_by_space($row['image_url']);
$images = $image;
array_shift($images);

$params = [
    "category" => $row['category'],
    "desc" => $row['description'],
    "title" => $row['name'],
    "price" => $row['price'],
    "available" => $row['available'],
    "image" => $image[0],
    "images" => $images
];


// рендеринг в вывод
$latte->render(__MODULES_DIR__.'/product/product.latte', $params);