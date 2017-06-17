<?php require_once('config.php') ?>
<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">Home</a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a target="blank" href="https://github.com/DimaSmile/myBlog">Git</a></li>
						<li><a target="blank" href="https://smilecats.slack.com/messages/C597T9K7E/">Slack</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
					<?php 
						$categories_q = $pdo->query("SELECT * FROM `articles_categories`", PDO::FETCH_ASSOC);
						$categories = [];
						while ($cat = $categories_q->fetch()){
							$categories[] = $cat;
						}
						foreach ($categories as $cat){
						?>
							<li><a href="/articles.php?id=<?php echo $cat['id']; ?>"><?php  echo $cat['title'] ?></a></li>
						<?php
						} 
						?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Info <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/pages/aboutMe.php">About me</a></li>
								<li><a href="/pages/contacts.php">Contacts</a></li>
								<li><a href="/pages/Edit.php">Edit</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>