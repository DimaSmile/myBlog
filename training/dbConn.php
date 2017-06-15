<?php 
//Подключение к БД
$userName = 'root';
$password = 'dimasql';

try{
	$conn = new PDO('mysql:host=localhost;dbname=myBlog', $userName, $password);
}catch(PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}