<?php
$latte = new Latte\Engine;
// каталог кэша
$latte->setTempDirectory('./cache/latte');

$result = db_query("SELECT * FROM store WHERE `id`=1");
$row = db_fetch_assoc($result);

$params = [
    "category" => null,
];


// рендеринг в вывод
$latte->render(__MODULES_DIR__.'/store/store.latte', $params);