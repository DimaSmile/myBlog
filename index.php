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
							<?php $articles = $pdo->query("SELECT * FROM `articles`", PDO::FETCH_ASSOC);
								while ($art = $articles->fetch()){?>
								<article class="article">
			                   		<div class="article__image" style="background-image: url(/public/images/<?php  echo $art['image']; ?>);"></div>
			                    	<div class="article__info">
			                      		<a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
			                      		<div class="article__info__meta">
			                      		<?php  
			                      			$art_cat = false;
			                      			foreach ($stmt as $cat) {
			                      				if ($cat['id'] == $art['categorie_id']) {//сравнение id для получения категории из таблицы articles_categories
			                      					$art_cat = $cat;
			                      					break;
			                      				}
			                      			}

			                      		?>
				                        	<small>Categorie: <a href="#"><?php echo $art_cat['title'] ?></a></small>
				                      	</div>
				                      	<div class="article__info__preview"><?php echo mb_substr($art['text'], 0, 50, 'utf-8') ?></div>
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