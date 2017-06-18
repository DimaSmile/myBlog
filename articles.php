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
                <div class="text-right" ><a href="/"><button class="btn btn-default large" type="button">New posts</button></a></div>
                <div class="articles articles__horizontal">
                <?php 
                $per_page = 4;
                $page = 1;

                if (isset($_GET['page'])) {
                    $page = (int) $_GET['page'];
                }
                $total_count_q = $pdo->query("SELECT COUNT(`id`) `total_count` FROM `articles`");
                $total_count = $total_count_q->fetch();
                $total_count = $total_count['total_count'];

                $total_pages = ceil($total_count / $per_page);
                if ($page <= 1 || $page >  $total_pages) {
                    $page = 1;
                }
                if ($page != 0) {   
                    $offset =($per_page * $page) - $per_page;
                }
                $articles = $pdo->query("SELECT * FROM `articles` ORDER BY `id` DESC LIMIT $offset,$per_page", PDO::FETCH_ASSOC);
                if ($total_count_q->rowCount()<= 0) {
                    echo 'Статей не найдено!!!';
                }
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
                <?php } 
                    if ($total_count_q->rowCount() > 0) {
                        echo '<div class="pager">';
                        if ($page > 1) {
                            echo '<a href="/articles.php?page='.($page - 1).'"><button type="button" class="btn btn-info">Предыдущая</button></a>';
                        }
                        if ($page < $total_pages) {
                            echo '<a href="/articles.php?page='.($page + 1).'"><button type="button" class="btn btn-info">Следующая</button></a>';
                        }
                        echo '<div>';
                    }
                ?>
            </div>
        </div>
    </div>

    </div>
</div>      
        <!-- RIGHT SIDEBAR TOP -->
        <?php require('includes/sidebar_top.php') ?>


    
<?php require_once('includes/footer.php') ?>