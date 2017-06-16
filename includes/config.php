<?php
//ПРАВИЛЬНОЕ ПОДКЛЬЧЕНИЕ К БД С ПОМОШЬЮ PDO

$config = [
	'title'=> 'My Blog',
	'bd' => [
		'server' => 'localhost',
		'userName' =>'root',
		'password' => 'dimasql',
		'name' => 'myBlog',
	]
];

// $server = 'localhost';
// $userName = 'root';
// $password = 'dimasql';
// $name = 'myBlog';

$dsn = "mysql:host={$config['bd']['server']};dbname={$config['bd']['name']};";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

require_once('db.php');
