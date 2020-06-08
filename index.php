<?php
    // Includes
    include './includes/config.php';

    // Select TV Show
    $query = $pdo->query('SELECT id, title, image FROM articles');
    $articles = $query->fetchAll();

    // Header
    include './includes/header.php';
?>
<!-- Home page title -->
<h1 class="home-title">Les séries</h1>
<!-- TV Show list -->
<div class="tv-show-list">
    <?php foreach($articles as $_article): ?>
        <!-- TV Show -->
        <article class="article">
            <!-- TV Show link -->
            <a href="article.php?id_tv_show=<?= $_article->id ?>">
                <!-- TV Show image -->
                <img src="<?= $_article->image ?>" class="logo-tv-show" alt="Logo de la série">
            </a>
        </article>
    <?php endforeach ?>
</div>
<a class="add-tv-show" href="addarticle.php"><svg fill="#3c3c3c" width="48" height="48" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg>Ajouter une série</a>
<?php
    // Footer
    include './includes/footer.php';
?>