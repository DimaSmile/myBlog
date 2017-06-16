<?php 
	
require_once('includes/config.php');

 ?>

<?php require_once('includes/head.php') ?>

<?php require_once('includes/navbar.php') ?>
<h1 class="text-center"><?php echo $config['title']; ?></h1>
<div class="wrapper">
<div id="content">
     <div class="container">
        <div class="row">
          	<section class="content__left col-md-8">
            	<div class="block">
             	<a href="#">Все записи</a>
              	<h3>Новейшее_в_блоге</h3>
             		<div class="block__content">
            			<div class="articles articles__horizontal">
							<?php $stmt = $pdo->query('SELECT * FROM `articles`');
								while ($row = $stmt->fetch(PDO::FETCH_LAZY)){?>
								<article class="article">
			                   		<div class="article__image" style="background-image: url(/public/images/<?php  echo $row['image']; ?>);"></div>
			                    	<div class="article__info">
			                      		<a href="/article.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
			                      		<div class="article__info__meta">
				                        	<small>Категория: <a href="#">Программирование</a></small>
				                      	</div>
				                      	<div class="article__info__preview"><?php echo mb_substr($row['text'], 0, 50, 'utf-8') ?></div>
			                    	</div>
			                 	 </article>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
</div>					

		
<?php require_once('includes/footer.php') ?>