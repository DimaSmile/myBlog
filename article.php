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
        <?php $article = $pdo->prepare("SELECT * FROM `articles` WHERE `id` = ?");
              $article->execute(array($_GET['id']));  

        if ($article->rowCount() > 0) {
                $art = $article->fetch();
                
            ?>
        <h3><?php echo $art['title']?></h3>
           <div class="text-right"><a href="" ><?php echo $art['views'] ?> просмотров</a></div>
              <div class="block__content" >
                <div class="full-text">
                    <?php echo $art['text']?>
                </div>
                div
              </div>
            <?php
        }else{
              ?>
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Сатьтя не найдена!</strong> Запрашиваемая Вами статья не существует!!!
            </div>
            <a class="btn btn-success" href="/" role="button">Home</a>

            <?php 
            } ?>
        
      </div>
    </div>
    <!-- RIGHT SIDEBAR COMMENTS -->
    <?php require('includes/sidebar_comments.php') ?>
  </div>
</div>




    

    
<?php require_once('includes/footer.php') ?>