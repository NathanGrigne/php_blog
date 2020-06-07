<?php
    // Includes
    include './includes/config.php';

    // Select articles
    $query = $pdo->query('SELECT id, title, image FROM articles');
    $articles = $query->fetchAll();

    // Header
    include './includes/header.php';
?>
<!-- Home page title -->
<h1 class="home-title">Les séries</h1>
<!-- Articles list -->
<div class="tv-show-list">
    <?php foreach($articles as $_article): ?>
        <!-- Article -->
        <article class="article">
            <!-- Article link -->
            <a href="article.php?id_tv_show=<?= $_article->id ?>">
                <!-- Article image -->
                <img src="<?= $_article->image ?>" class="logo-tv-show" alt="Logo de la série">
            </a>
        </article>
    <?php endforeach ?>
</div>
<?php
    // Footer
    include './includes/footer.php';
?>