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
                $plus_views = $pdo->prepare("UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = ?");
                $plus_views->execute(array($_GET['id'])); 
            ?>
        <h3><?php echo $art['title']?></h3>
           <div class="text-right"><a href="" ><?php echo $art['views'] ?> просмотров</a></div>
           <img src="public/images/<?php echo $art['image'] ?>" alt="" style="max-width: 100%;">
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
            <?php require_once('includes/sidebar_comments.php') ?>
  </div>
        <!-- BOTTOM COMMENTS -->
        <div class="col-md-12 ">
            <div class="col-md-1"></div>
            <div class="col-md-8">
                <div class="widget-area">
                   <div class="text-right" ><a href="#comment-add-form"><button class="btn btn-default large" type="button">Добавить комментарий</button></a></div>
                    <h2 class="widget-title">Comments</h2>
                    <div class="friend-list">   
                      <div class="block__content">
                        <div class="articles articles__vertical">
                            <?php

                             $comment = $pdo->prepare("SELECT * FROM `comments` WHERE `articles_id` = ? ORDER BY `id` DESC");
                             $comment->execute(array($art['id']));
                                if ($comment->rowCount() > 0) {
                                    while ($art = $comment->fetch()){?>
                                    <article class="article">
                                        <div class="article__image" style="background-image: url(https://s.gravatar.com/avatar/<?php echo md5($art['email']) ?>?s=80"></div>
                                        <div class="article__info">
                                            <a href="/article.php?id=<?php echo $art['articles_id']; ?>"><?php echo $art['author']; ?></a>
                                            <div class="article__info__meta">
                                            </div>
                                            <div class="article__info__preview"><?php echo $art['text']; ?></div>
                                        </div>
                                    </article>
                                <?php }
                                }else{?>
                            <div class="alert alert-info">
                                <strong>Здесь пока нету комментариев!</strong>
                            </div>
                            <?php } ?>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- ADD COMMENTS -->
        <div class="col-md-12">
        <div class="col-md-1"></div>
            <div class="col-md-8">
                <div class="widget-area" id="comment-add-form">
                        <?php 
                            if (isset($_POST['do_post'])) {
                                $errors = [];
                                if ($_POST['name'] == '') {
                                   $errors[] = 'Введите имя!';
                                }
                                if ($_POST['nickname'] == '') {
                                   $errors[] = 'Введите никнейм!';
                                }
                                if ($_POST['email'] == '') {
                                   $errors[] = 'Введите email!';
                                }
                                if ($_POST['text'] == '') {
                                   $errors[] = 'Введите текст!';
                                }

                                if (empty($errors)) {
                                    echo '<span style="color: green; font-weight: bold;">Комментарий успешно добавлен</span>';
                                }else{
                                    echo '<span style="color: red; font-weight: bold;">'.$errors[0].'</span>';
                                }

                            }

                         ?>
                    <form method="POST" action="article.php?id=<?= $art['id'] ?>#comment-add-form">
                        <div class="col-md-4">
                            <div class="inline-form">
                                <label class="c-label">Имя</label><input value="<?php echo $_POST['name'] ; ?>"  name="name" type="text" placeholder="Имя" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="inline-form">
                                <label class="c-label">Никнейм</label><input value="<?php echo $_POST['nickname'] ; ?>"  name="nickname" type="text" placeholder="Никнейм" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="inline-form">
                                <label class="c-label">Email</label><input value="<?php echo $_POST['email'] ; ?>" name="email" type="text" placeholder="Email" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="inline-form">
                                <label class="c-label">Написать комментарий</label><textarea name="text"  placeholder="Ваш комментарий" rows="5"><?php echo $_POST['text'] ; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class=" inline-form">
                                <button type="submit" class="btn btn-primary" name="do_post">Добавить комментарий</button>
                            </div>
                        </div>                                                                      
                    </form>
                </div>
            </div>
</div>
<div class="container">
<?php require_once('includes/footer.php') ?>
</div>