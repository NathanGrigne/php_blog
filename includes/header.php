<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog des séries</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@500;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/ico" href="./images/favicon.ico"/>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <!-- Home title -->
            <a href="/">Home</a>
            <div class="access">
                <?php 
                    if($_SESSION){
                        $query = $pdo->query('SELECT id FROM users WHERE username ="'.$_SESSION['username'].'"');
                        $id_user = $query->fetchAll();
                        ?>
                            <a class="account" href="account.php?id_account=<?= $id_user[0]->id ?>">
                                <h3 class="username-header"><?= $_SESSION['username'] ?></h3>
                                <svg width="24" height="24" viewBox="0 0 24 24"><path fill="#ffffff" d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm7.753 18.305c-.261-.586-.789-.991-1.871-1.241-2.293-.529-4.428-.993-3.393-2.945 3.145-5.942.833-9.119-2.489-9.119-3.388 0-5.644 3.299-2.489 9.119 1.066 1.964-1.148 2.427-3.393 2.945-1.084.25-1.608.658-1.867 1.246-1.405-1.723-2.251-3.919-2.251-6.31 0-5.514 4.486-10 10-10s10 4.486 10 10c0 2.389-.845 4.583-2.247 6.305z"/></svg>
                            </a>
                            <a href="/logout.php">Log Out</a>
                        <?php
                    }
                    else{
                        ?>
                            <a href="/login.php">Log In</a>
                            <br>
                            <a href="/register.php">Register</a>
                        <?php
                    }
                ?>
            </div>
        </div>
    </header>