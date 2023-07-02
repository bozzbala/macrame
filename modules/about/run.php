<?php
$latte = new Latte\Engine;
// каталог кэша
$latte->setTempDirectory('./cache/latte');

$params = [
    "category" => null,
];


// рендеринг в вывод
$latte->render(__MODULES_DIR__.'/about/about.latte', $params);