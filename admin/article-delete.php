<?php
// require('includes/init.php');
require('../includes/header.php');
$conn = require('../includes/database.php'); ?>

<?php
$id = $_GET['id'];
$article = Article::getByID($conn, $id);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($article->delete($conn)) {
        header('Location:index.php');
    }
}
?>

<main class="container">
    <h2>usuń artykuł</h2>
    <form method="post">
        <p>Czy jesteś tego pewien?</p>
        <div>
      
            <button type="submit">usuń</button>
            
        </div>
    </form>
    <a href="article.php?id=<?= $id ?>"><button >cofnij</button></a>  
</main>


<?php require('../includes/footer.php') ?>