<?php
require_once './includes/class.Router.php';
$router = new Router();

$router->addRoute('/', __MODULES_DIR__ . '/home/run.php');
$router->addRoute('/index', __MODULES_DIR__ . '/home/run.php');
$router->addRoute('/home', __MODULES_DIR__ . '/home/run.php');
$router->addRoute('/products', __MODULES_DIR__ . '/products/run.php');
$router->addRoute('/product', __MODULES_DIR__ . '/product/run.php');
$request_uri = $_SERVER['REQUEST_URI'];
$_get = $_GET;
$_post = $_POST;

$router->handleRequest($request_uri);