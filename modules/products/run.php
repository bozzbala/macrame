<?php
$latte = new Latte\Engine;
// каталог кэша
$latte->setTempDirectory('./cache/latte');

global $conn;
$count = db_get_data("SELECT COUNT(DISTINCT(category)) FROM products") ?? 0;
$shnur = db_get_assoc("SELECT * FROM products WHERE `category`='Шнуры'") ?? [];
$nabor = db_get_assoc("SELECT * FROM products WHERE `category`='Наборы'") ?? [];
$master = db_get_assoc("SELECT * FROM products WHERE `category`='Мастер-классы'")?? [];

$params = [
    "count" => $count,
    "shnur" => $shnur,
    "nabor" => $nabor,
    "master" => $master
];

// рендеринг в вывод
$latte->render(__MODULES_DIR__.'/products/products.latte', $params);