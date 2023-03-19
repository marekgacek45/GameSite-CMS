<?php

require('../../includes/header.php');
$conn = require('../../includes/database.php'); ?>


<?php
$id = $_GET['id'];
$article = Article::getByID($conn, $id);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    var_dump($_FILES);

    $image = $_FILES['file'];


    try {
        if (empty($_FILES)) {
            throw new Exception('nie udało się zaktualizować zdjęcia');
        }
        switch ($image['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('nie wybrałeś pliku');
                break;
            default:
                throw new Exception('wystąpił błąd');
        }

        if ($image['size'] > 1000000) {
            throw new Exception('zdjęcie jest zbyt duże');
        }

        $mime_types = ['image/gif', 'image/png', 'image/jpeg'];
        if (!in_array($image['type'], $mime_types)) {
            throw new Exception('Nieprawidłowy format zdjęcia');
        }

        $pathinfo = pathinfo($image['name']);
        $base = $pathinfo['filename'];
        $base = preg_replace('/[^a-zA-Z0-9_-]/', "-", $base);
        $filename = $base . "." . $pathinfo['extension'];

        $destination = "../../uploads/$filename";

        $i = 1;

        while (file_exists($destination)) {
            $filename = $base . "$i" . "." . $pathinfo['extension'];
            $destination = "../../uploads/$filename";
            $i++;
        }

        if (move_uploaded_file($image['tmp_name'], $destination)) {

            $previousImage = $article->thumbnail;


            if ($article->setImage($conn, $filename)) {

                if ($previousImage) {
                    unlink("../../uploads/$previousImage");
                }


                header("LOCATION: http://localhost/gameSiteCMS/article.php?id=$id");
            }


        } else {
            throw new Exception('Nie udało się przenieść pliku');
        }





    } catch (Exception $e) {
        echo $e->getMessage();
    }

}



?>


<form method="post" enctype="multipart/form-data">
    <div>
        <label for="file">Obraz:</label>
        <input type="file" name="file" id="file">
    </div>
    <button type="submit">Dodaj</button>
</form>
<a href="delete-image.php?id=<?= $id ?>"><button>usuń</button></a>