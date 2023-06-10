<?php
$latte = new Latte\Engine;
// каталог кэша
$latte->setTempDirectory('./cache/latte');

$params = [
    "word" => "FEWs",
];
// или $params = new TemplateParameters(/* ... */);

// рендеринг в вывод
$latte->render(__MODULES_DIR__.'/home/home.latte', $params);