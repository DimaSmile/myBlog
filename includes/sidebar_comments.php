<!-- RIGHT SIDEBAR COMMENTS -->
<div class="col-md-3">
	<div class="widget-area">
		<h2 class="widget-title">Comments</h2>
		<div class="friend-list">	
          <div class="block__content">
            <div class="articles articles__vertical">
				<?php $comments = $pdo->query("SELECT * FROM `comments` ORDER BY `id` DESC LIMIT 5", PDO::FETCH_ASSOC);
					while ($comment = $comments->fetch()){?>
					<article class="article">
		           		<div class="article__image" style="background-image: url(https://s.gravatar.com/avatar/<?php echo md5($comment['email']) ?>?s=80"></div>
		            	<div class="article__info">
		              		<a href="/article.php?id=<?php echo $comment['articles_id']; ?>"><?php echo $comment['author']; ?></a>
		              		<div class="article__info__meta">
		                  	</div>
		                  	<div class="article__info__preview"><?php echo mb_substr(strip_tags($comment['text']), 0, 50, 'utf-8'); ?></div>
		            	</div>
		         	 </article>
				<?php } ?>
            </div>
          </div>
		</div>
	</div>
</div>