<?php

require('../../includes/header.php');

Authentication::isLoggedIn();

$db = new Database();
$conn = $db->getConn();

$id = $_GET['id'];

if (isset($id)) {
    $article = Article::getByID($conn, $id);

    if (!$article) {
        die('nie ma takiego artykułu');
    }
} else {
    die('nie ma takiego id');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $previous_image = $article->thumbnail;

    if ($article->setImage($conn, null)) {

        if ($previous_image) {
            unlink("../uploads/$previous_image");
        }

        header("Location:/gameSiteCMS/admin/index.php");
        //to trzeba poprawić
    }
    ;
}

?>






<h2>Usuń zdjęcie:</h2>

<form method="post">

    <p>jesteś pewien?</p>

    <button type="submit">Usuń</button>
    <button>Cofnij</button>
</form>



<?php require('../../includes/footer.php') ?>