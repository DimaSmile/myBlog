<?php

////ПРАВИЛЬНОЕ ПОДКЛЮЧЕНИЕ К БД С ПОМОШЬЮ PDO

$pdo = new PDO($dsn, $config['bd']['userName'], $config['bd']['password'], $opt);

