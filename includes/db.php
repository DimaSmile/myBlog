<?php

//Подключение к БД
////ПРАВИЛЬНОЕ ПОДКЛЬЧЕНИЕ К БД С ПОМОШЬЮ PDO
require_once ('config.php');

$pdo = new PDO($dsn, $userName, $password, $opt);

