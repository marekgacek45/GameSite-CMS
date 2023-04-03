<?php

require('includes/header.php');




$user = new User();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $user->first_name = $_POST['first_name'];
    $user->last_name = $_POST['last_name'];
    $user->username = $_POST['username'];

    $conn = require('includes/database.php');

    $user->register($conn);

 

}



?>
<div class="container d-flex flex-column justify-content-center align-items-center" style="margin-top:2em">
    <h2>Rejestracja nowego użytkownika</h2>

    <form method="POST">
        <label for="first_name">Imie:</label>
        <input name="first_name" id="first_name" type="text">
        <label for="last_name">Nazwisko:</label>
        <input name="last_name" id="last_name" type="text">
        <label for="username">Nazwa użytkownika:</label>
        <input name="username" id="username" type="text">

        <button type="submit">Wyślij</button>
    </form>




    <div>

        <?php require('includes/footer.php') ?>