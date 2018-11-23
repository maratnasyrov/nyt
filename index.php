<?php

// Вывод ошибок
ini_set("display_errors", 1);
error_reporting( E_ALL);

// Подключение компонентов
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Connect.php');

$router = new Router();
$router->run();
