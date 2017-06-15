<?php 
//ПРОСТАЯ ФОРМА АВТОРИЗАЦИИ
require_once('dbConn.php');

$login = $_POST['login'];
$password = $_POST['password'];

// echo "You login: " . $login . '<br>';
// echo "You password: " . $password;

$bd = $conn->query("SELECT * FROM `users` WHERE `login` = '$login' and `password` = '$password'");
$bd->setFetchMode(PDO::FETCH_ASSOC);
if($bd->fetchColumn() == 0 ){
	echo "Вы не зарегистрированы";
}else{
	echo "Привет $login!";
}