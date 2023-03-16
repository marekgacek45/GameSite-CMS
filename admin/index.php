<?php
// require('includes/init.php');
// require('includes/header.php');
require('../includes/header.php');
$conn = require('../includes/database.php');
?>


<?php
$articles = Article::getAll($conn);

?>

<main class="container">

    <h2>admin</h2>


    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tytuł</th>
            </tr>
        </thead>
        <tbody>


            <?php foreach ($articles as $article): ?>
                <tr>

                    <th scope="row">
                        <?= htmlspecialchars($article['id']) ?>
                    </th>
                    <td>
                        <a href="article.php?id=<?= $article['id'] ?>"><?= htmlspecialchars($article['title']) ?></a>
                    </td>

                </tr>

            <?php endforeach ?>

        </tbody>
    </table>



</main>

<?php require('../includes/footer.php') ?>