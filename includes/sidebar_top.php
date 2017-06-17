<!-- RIGHT SIDEBAR TOP -->
<div class="col-md-3">
	<div class="widget-area">
		<h2 class="widget-title">Top posts</h2>
		<div class="friend-list">	
            <div class="block__content">
                <div class="articles articles__vertical">
					<?php $articles = $pdo->query("SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 5", PDO::FETCH_ASSOC);
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
	</div>
</div>