<?php
    // Includes
    include './includes/config.php';
   
    // Id
    $id_tv_shows = (int)$_GET['id_tv_show'];

    //Set Username
    $username = $_SESSION['username'];

    // Select article
    $query = $pdo->query('SELECT id, title, text, date, image, synopsis, note, image_tv_show FROM articles WHERE id = '.$id_tv_shows);
    $article = $query->fetchAll();

    $query = $pdo->query('SELECT * FROM comments WHERE id_comment = '.$id_tv_shows);
    $comments = $query->fetchAll();

    // Messages
    $errorMessages = [];
    $successMessages = [];

    // Base value
    $comment = '';

    // Form sent
    if(!empty($_POST)){
        // Sanatize
        $comment = trim(strip_tags($_POST['comment']));

        // Error
        if(empty($comment)){
            $errorMessages[] = 'Veuillez entrer votre commentaire';
        }

        // Success
        if(empty($errorMessages)){
            // Save in database
            $data = [
            'id_comment'=> $id_tv_shows,
            'username'=> $username,
            'text'=> $comment
        ];
        $prepare = $pdo->prepare('INSERT INTO comments (id_comment, username, text) VALUES (:id_comment, :username, :text)');

        $prepare->execute($data);

            if(!$prepare){
                $successMessages[] = 'Un problème est survenu, veillez contacter un administrateur';
            }

            // Message
            $successMessages[] = 'Votre commentaire a été envoyé';

            // Reset value
            $comment = '';

            // Refresh page
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    // Header
    include './includes/header.php';
?>

<!-- Decription TV Show -->
<div class="header-tv-show">
    <img class="tv-show-logo" src="<?= $article[0]->image ?>" alt="Logo de la série">
    <div class="tv-show-desc">
        <h1 class="tv-show-title"><?= $article[0]->title ?></h1>
        <div class="tv-show-date">(
            <?php
            // Need to date_create to be in the good format to use date_format to write the date in french format
            $date = date_create($article[0]->date);
            //Date in french format
            echo date_format($date,"Y");
        ?>
        )
        </div>
    </div>
</div>

<!-- TV Show content -->
<div class="tv-show-content">
    <!-- TV Show synopsis -->
    <h2>Synopsis :</h2>
    <div class="tv-show-text">
        <p><?= $article[0]->synopsis ?></p>
    </div>

    <!-- TV Show Image -->
    <img class="image-tv-show" src="<?= $article[0]->image_tv_show ?>"></div>
</div>

<div class="tv-show-critic-container">
    <!-- TV Show Critic -->
    <h2>Critique :</h2>
    <h3><?= $article[0]->note ?></h3>
    <div class="tv-show-critic">
        <p><?= nl2br($article[0]->text) ?></p>
    </div>
</div>

<div class="comments-container">
    <h2>Commentaires :</h2>

    <!-- Comments -->
    <ul class="article-comments">
        <?php foreach($comments as $_comment): ?>
            <li>
                <!-- Comment -->
                <?= nl2br($_comment->text) ?>
                <!-- Delete comment -->
                <br>
                Écrit par : <?= $_comment->username ?>
                <a class="delete-comment" href="includes/delete.php?id_tv_show=<?= $article[0]->id ?>&id_comment=<?= $_comment->id ?>">Supprimer</a>
            </li>
        <?php endforeach ?>
    </ul>

    <!-- Add comment -->
    <form action="#" method="post">
        <label for="comment">Votre commentaire</label>
        <br>
        <textarea id="comment" type="text" placeholder="Votre commentaire" name="comment" value="<?= $comment ?>"></textarea>
        <br>
        <input type="submit">
    </form>
    <!-- Messages -->
    <?php foreach($errorMessages as $_message):?>
    <div class="message-error"><?= $_message ?></div>
    <?php endforeach ?>
    <?php foreach($successMessages as $_message):?>
    <div class="message-success"><?= $_message ?></div>
    <?php endforeach ?>

</div>


<?php
    // Footer
    include './includes/footer.php';
?>