<?php

$base_url = "http://localhost/php-mvc/";
$base_dir = "/php-mvc/";

$tmp = explode('?', $_SERVER['REQUEST_URI']);
$current_route = str_replace($base_dir, '', $tmp[0]);
unset($tem);

$dbHost = "localhost";
$dbName = "php_mvc";
$dbUserName = "root";
$dbPassoword = "";

