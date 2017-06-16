<?php 
//Подключение к БД
$server = 'localhost';
$userName = 'root';
$password = 'dimasql';
$name = 'myBlog';


$dsn = "mysql:host=$server;dbname=$name;";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $userName, $password, $opt);