<?php require('includes/init.php'); ?>

<?php require('includes/header.php') ?>

<?php $conn = require('includes/database.php');?>

<?php 
$id = $_GET['id'];

$article = Article::getByID($conn,$id);

?>

<main class="container">
    <h2><?= $article->title ?></h2>
    <p><?= $article->content ?></p>
</main>

<?php require('includes/footer.php') ?>