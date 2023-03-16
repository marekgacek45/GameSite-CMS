<?php require('includes/init.php');
; ?>

<!DOCTYPE html>
<html lang="pl">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GameSiteCMS</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
                crossorigin="anonymous">
</head>

<body>

        <nav class="navbar navbar-dark bg-primary">
                <div class="container">

                <div>
                        <?php if (isset($_SESSION['username'])): ?>
                                <p>Witaj,
                                        <?= $_SESSION['username'] ?>
                                </p>
                        <?php endif ?>

                        <?php if ( isset($_SESSION['is_logged_in'])): ?>
                                <a href="logout.php"><button>wyloguj się</button></a>
                        <?php else: ?>
                                <a href="login.php"><button>zaloguj się</button></a>
                        <?php endif ?>
                        </div>
                        <a href="article-create.php"><button>stwórz nowy artykuł</button></a>
                </div>
        </nav>
        <a href="index.php">
                <h1>GameSITE CMS</h1>
        </a>