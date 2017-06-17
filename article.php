<?php 
  
require_once('includes/config.php');

 ?>

<?php require_once('includes/head.php') ?>

<?php require_once('includes/navbar.php') ?>
<h2 class="text-center">Article</h2>

<div class="row">
  <div class="col-md-12">
    <div class="col-md-1"></div>
    <div class="col-md-8">
      <div class="widget-area">
        <?php $article = $pdo->prepare("SELECT * FROM `articles` WHERE `id` = ?", PDO::FETCH_ASSOC);
              $article->execute($_GET['id']);  
        if ($article->fetchColumn() <= 0) {
            ?>
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Сатьтя не найдена!</strong> Запрашиваемая Вами статья не существует!!!
            </div>
            <?php
        }else{
        ?>
            <a href=""><?php echo $art['views'] ?>просмотров</a>
              <h3><?php $art['title']?></h3>
              <div class="block__content">
                <img src="/media/images/post-image.jpg">

                <div class="full-text">
                    <?php $art['text']?>
                </div>
              </div>
    <?php }
        ?>
      </div>
    </div>
    <!-- RIGHT SIDEBAR COMMENTS -->
    <?php require('includes/sidebar_comments.php') ?>
  </div>
</div>




    

    
<?php require_once('includes/footer.php') ?>