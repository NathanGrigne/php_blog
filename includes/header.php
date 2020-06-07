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
                        ?>
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