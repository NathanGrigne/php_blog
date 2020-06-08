<?php
    include 'includes/config.php';

    $query = $pdo->query('SELECT * FROM articles');
    $tv_shows = $query->fetchAll();

    $title = '';
    $text = '';
    $date = date('Y-m-d');
    $image = '';
    $synopsis = '';
    $note = '';
    $image_tv_show = '';

    // Messages
    $errorMessages = [];
    $successMessages = [];

    if(!empty($_POST)){
        //Sanatize
        $title = trim(strip_tags($_POST['title']));
        $text = trim(strip_tags($_POST['text']));
        $image = trim(strip_tags($_POST['image']));
        $synopsis = trim(strip_tags($_POST['synopsis']));
        $note = trim(strip_tags($_POST['note']));
        $image_tv_show = trim(strip_tags($_POST['image_tv_show']));

        //Error
        if(empty($title)){
            $errorMessages[] = 'Veuillez entrer le titre';
        }
        if(empty($text)){
            $errorMessages[] = 'Veuillez entrer le texte';
        }
        if(empty($image)){
            $errorMessages[] = 'Veuillez entrer le lien du logo';
        }
        if(empty($synopsis)){
            $errorMessages[] = 'Veuillez entrer le synopsis';
        }
        if(empty($note)){
            $errorMessages[] = 'Veuillez entrer la note';
        }
        if(empty($image_tv_show)){
            $errorMessages[] = `Veuillez entrer le lien de l'image d'illustration`;
        }

        // Success
        if (empty($errorMessages))
        {
            $data = [
                'title'=> $title,
                'text'=> $text,
                'date'=> $date,
                'image'=> $image,
                'synopsis'=> $synopsis,
                'note'=> $note,
                'image_tv_show'=> $image_tv_show
            ];
            $prepare = $pdo->prepare('INSERT INTO articles (title, text, date, image, synopsis, note, image_tv_show) VALUES (:title, :text, :date, :image, :synopsis, :note, :image_tv_show)');

            $prepare->execute($data);

            if(!$prepare){
                $successMessages[] = 'Un problème est survenu, veillez contacter un administrateur';
            }

            // Message
            $successMessages[] = 'Votre commentaire a été envoyé';

            header("location:/");

            //Reset Value
            $_POST['title'] = '';
            $_POST['text'] = '';
            $_POST['date'] = '';
            $_POST['image'] = '';
            $_POST['synopsis'] = '';
            $_POST['note'] = '';
            $_POST['image_tv_show'] = '';
        }
    }

    include 'includes/header.php';
?>

<form class="add-tv-show-form" action="#" method="post">
    <label for="title">Titre de la série</label>
    <br>
    <input class="input-text" type="text" name="title" id="title" value="<?= $title ?>" placeholder="The Office">

    <br>
    <label for="text">Votre Critique</label>
    <br>
    <textarea class="input-textarea" type="text" name="text" id="text" value="<?= $text ?>" placeholder="The Office"></textarea>

    <br>
    <label for="date">Date de création de la série</label>
    <br>
    <input class="input-text" type="date" name="date" id="date" value="<?= $date ?>">

    <br>
    <label for="image">Lien du logo de la série</label>
    <br>
    <input class="input-text" type="text" name="image" id="image" value="<?= $image ?>" placeholder="https://static.hudl.com/users/temp/7527305_f59e45fe76b64658800bdc932ffcf7a2.jpeg">

    <br>
    <label for="synopsis">Synopsis</label>
    <br>
    <textarea class="input-textarea" type="text" name="synopsis" id="synopsis" value="<?= $synopsis ?>" placeholder="Cette série met en scène le quotidien des employés de bureau d'une société de vente de papier, Dunder Mifflin, à Scranton en Pennsylvanie et de leur fantasque responsable, Michael Scott."></textarea>

    <br>
    <label for="note">Note</label>
    <br>
    <input class="input-text" type="text" name="note" id="note" value="<?= $note ?>" placeholder="16/20">

    <br>
    <label for="image_tv_show">Lien d'une illustration de la série</label>
    <br>
    <input class="input-text" type="text" name="image_tv_show" id="image_tv_show" value="<?= $image_tv_show ?>" placeholder="https://static.hudl.com/users/temp/7527305_f59e45fe76b64658800bdc932ffcf7a2.jpeg">

    <br>
    <input class="submit-button-article" type="submit">
</form>