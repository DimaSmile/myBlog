<?php //Работа с бд PDO

require_once('dbConn.php');
$sql = ("SELECT * FROM `articles_categories` ");

$resault = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
<h1 class="text-center">List Bd</h1>
	<ul  class="list-group">
		<?php 
		foreach ($resault as $value) {
			//ДВА СПОСОБА ВЫВОДА КОЛИЧЕСТВА КАТЕГОРИЙ В (),  ПЕРВЫЙ БОЛЕЕ ПРОИЗВОДИТЕЛЬНЫЙ 
			$articles_count = $conn->query("SELECT COUNT(`id`) AS `total_count` FROM `articles` WHERE `categorie_id` = " . $value['id']);
			$articles_count->setFetchMode(PDO::FETCH_ASSOC);
			$row = $articles_count->fetch();
			echo '<li class="list-group-item">'.$value['id'] .' - '. $value['title']. '( '. $row['total_count'].' )'.'</li>';//rowCount() количество записей в категориях
			/*$articles_count = $conn->query("SELECT * FROM `articles` WHERE `categorie_id` = " . $value['id']);
			echo '<li class="list-group-item">'.$value['id'] .' - '. $value['title']. '( '. $articles_count->rowCount().' )'.'</li>';//rowCount() количество записей в категориях*/
		}
			
		?>
	</ul>


		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>
<?php 
$conn = NULL;
echo date('Y-m-d H:i:s');
?>

