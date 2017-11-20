<?php 
	
require_once('includes/config.php');

 ?>

<?php require_once('includes/head.php') ?>

<?php require_once('includes/navbar.php') ?>
<h2 class="text-center"><?php echo $config['title']; ?></h2>
<!-- НОВЕЙШЕЕ_В_БЛОГЕ -->

<div class="row">
	<div class="col-md-12">
	<div class="col-md-1"></div>
	<div class="col-md-8">
		<div class="widget-area">
		  		<h3>New posts</h3>
		 		<div class="text-right" ><a href="/articles.php"><button class="btn btn-default large" type="button">All posts</button></a></div>
				<div class="articles articles__horizontal">
				<?php $articles = $pdo->query("SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 10", PDO::FETCH_ASSOC);
					while ($art = $articles->fetch()){?>
					<article class="article">
		           		<div class="article__image" style="background-image: url(/public/images/<?php  echo $art['image']; ?>);"></div>
		            	<div class="article__info">
		              		<a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
		              		<div class="article__info__meta">
		              		<?php  
		              			$art_cat = false;
		              			foreach ($categories as $cat) {
		              				if ($cat['id'] == $art['categorie_id']) {//сравнение id для получения категории из таблицы articles_categories
		              					$art_cat = $cat;
		              					break;
		              				}
		              			}

		              		?>
		                    	<small>Categorie: <a href="/articles.php?categorie=<?php echo $art_cat['id'] ?>"><?php echo $art_cat['title'] ?></a></small>
		                  	</div>
		                  	<div class="article__info__preview"><?php echo mb_substr(strip_tags($art['text']), 0, 50, 'utf-8'). ' ...'; ?></div>
		            	</div>
		         	 </article>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- RIGHT SIDEBAR TOP -->
			<?php require('includes/sidebar_top.php') ?>
	</div>
</div>		


<!-- ОТДЕЛЬНЫЕ КАТЕГОРИИ -->
<!-- CATEGORIE SPORT -->
<div class="row">
	<div class="col-md-12">
		<div class="col-md-1"></div>
		<div class="col-md-8">
			<div class="widget-area">
			  		<h3>Sport [new]</h3>
			 		<div class="text-right" ><a href="/articles.php?categorie=2"><button class="btn btn-default large" type="button">All posts</button></a></div>
					<div class="articles articles__horizontal">
					<?php $articles = $pdo->query("SELECT * FROM `articles` WHERE `categorie_id` = 2 ORDER BY `id` DESC LIMIT 10", PDO::FETCH_ASSOC);
						while ($art = $articles->fetch()){?>
						<article class="article">
			           		<div class="article__image" style="background-image: url(/public/images/<?php  echo $art['image']; ?>);"></div>
			            	<div class="article__info">
			              		<a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
			              		<div class="article__info__meta">
			              		<?php  
			              			$art_cat = false;
			              			foreach ($categories as $cat) {
			              				if ($cat['id'] == $art['categorie_id']) {//сравнение id для получения категории из таблицы articles_categories
			              					$art_cat = $cat;
			              					break;
			              				}
			              			}

			              		?>
			                    	<small>Categorie: <a href="/articles.php?id=<?php echo $art_cat['id'] ?>"><?php echo $art_cat['title'] ?></a></small>
			                  	</div>
			                  	<div class="article__info__preview"><?php echo mb_substr(strip_tags($art['text']), 0, 50, 'utf-8') . ' ...'; ?></div>
			            	</div>
			         	 </article>
					<?php } ?>
				</div>
			</div>
			<!-- CATEGORIE PROGRAMMING -->
			<div class="col-md-1"></div>
			<div class="widget-area">
			<h3>Programming [new]</h3>
		 		<div class="text-right" ><a href="/articles.php?categorie=3"><button class="btn btn-default large" type="button">All posts</button></a></div>
				<div class="articles articles__horizontal">
					<?php 
					$articles = $pdo->query("SELECT * FROM `articles` WHERE `categorie_id` = 3 ORDER BY `id` DESC LIMIT 10", PDO::FETCH_ASSOC);
						while ($art = $articles->fetch()){?>
						<article class="article">
			           		<div class="article__image" style="background-image: url(/public/images/<?php  echo $art['image']; ?>);"></div>
			            	<div class="article__info">
			              		<a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
			              		<div class="article__info__meta">
			              		<?php  
			              			$art_cat = false;
			              			foreach ($categories as $cat) {
			              				if ($cat['id'] == $art['categorie_id']) {//сравнение id для получения категории из таблицы articles_categories
			              					$art_cat = $cat;
			              					break;
			              				}
			              			}

			              		?>
			                    	<small>Categorie: <a href="/articles.php?id=<?php echo $art_cat['id'] ?>"><?php echo $art_cat['title'] ?></a></small>
			                  	</div>
			                  	<div class="article__info__preview"><?php echo mb_substr(strip_tags($art['text']), 0, 50, 'utf-8') . ' ...'; ?></div>
			            	</div>
			         	 </article>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- RIGHT SIDEBAR COMMENTS -->
		<?php require('includes/sidebar_comments.php') ?>
	</div>
</div>
<?php require_once('includes/footer.php') ?>