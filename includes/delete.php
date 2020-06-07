<?php
    // Include
    include './config.php';

    // Retrieve id and delete comment
    $id_tv_shows = (int)$_GET['id_tv_show'];
    $id_comment = (int)$_GET['id_comment'];
    $pdo->exec('DELETE FROM comments WHERE id = '.$id_comment);

    // Redirect to home page
    header('location:/article.php?id_tv_show='.$id_tv_shows);
    exit;