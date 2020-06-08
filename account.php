<?php
    // Includes
    include 'includes/config.php';

    $query = $pdo->query('SELECT text, id_comment FROM comments WHERE username ="'.$_SESSION['username'].'"');
    $comments = $query->fetchAll();

    include 'includes/header.php';
?>

<h1><?= $_SESSION['username'] ?></h1>

<h2>Tous ses commentaires :</h2>
<?php foreach($comments as $_comments): ?>
    <div class="comments">
        <p><?= $_comments->text ?></p>
    </div>
<?php endforeach ?>