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

        <nav class="navbar navbar-dark bg-primary">
                <div class="container">

                        <div>
                                <?php if (isset($_SESSION['is_logged_in'])): ?>
                                        <a href="/gameSiteCMS/admin/index.php"><button>Panel Admina</button></a>
                                        <a href="article-create.php"><button>stwórz nowy artykuł</button></a>
                                <?php endif ?>

                                <?php if (isset($_SESSION['username'])): ?>
                                        <p>Witaj,
                                                <?= $_SESSION['username'] ?>
                                        </p>
                                <?php endif ?>

                                <?php if (isset($_SESSION['is_logged_in'])): ?>
                                        <a href="logout.php"><button>wyloguj się</button></a>

                                <?php else: ?>
                                        <a href="login.php"><button>zaloguj się</button></a>
                                <?php endif ?>
                        </div>

                </div>
        </nav>


        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>



        <a href="/gameSiteCMS/index.php">
                <h1>GameSITE CMS</h1>
        </a>