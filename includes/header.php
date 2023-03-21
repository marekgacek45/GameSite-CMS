<?php require(dirname(__DIR__) . '/includes/init.php');
?>

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

        <nav class="navbar navbar-expand-lg bg-body-tertiary ">
                <div class="container">
                        <a class="navbar-brand" href="/gameSiteCMS/index.php">GameSiteCMS</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                                <a class="nav-link" href="#">Gry</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="/gameSiteCMS/index.php">Artykuły</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="#">Multimedia</a>
                                        </li>
                                </ul>
                                <div>
                                        <?php if (isset($_SESSION['is_logged_in'])): ?>
                                                <a href="/gameSiteCMS/admin/index.php"><button
                                                                class="btn btn-sm btn-outline-secondary" type="button">Admin
                                                                Panel</button></a>
                                                <a href="article-create.php"><button class="btn btn-sm btn-outline-secondary"
                                                                type="button">Nowy Artykuł</button></a>
                                        <?php endif ?>

                                        <?php if (isset($_SESSION['is_logged_in'])): ?>
                                                <a href="/gameSiteCMS/logout.php"><button
                                                                class="btn btn-sm btn-outline-secondary"
                                                                type="button">Logout</button></a>

                                        <?php else: ?>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal">
                                                        Login
                                                </button>
                                        <?php endif ?>


                                </div>


                        </div>
                </div>
        </nav>






        <?php require(dirname(__DIR__) . '/login.php') ?>