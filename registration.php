<?php
// require('includes/init.php');
require('includes/header.php');
$conn = require('includes/database.php');
?>
<div class="container d-flex flex-column justify-content-center align-items-center" style="margin-top:2em">
    <h2>Rejestracja nowego użytkownika</h2>


    <form method='POST'>
        <div class="form-group">
            <label for="firstName">Imie:</label>
            <input type="text" class="form-control" id="firstName" aria-describedby="firstNameHelp"
                placeholder="Podaj imie">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>

        <div class="form-group">
            <label for="lastName">Nazwisko:</label>
            <input type="text" class="form-control" id="lastName" aria-describedby="lastNameHelp"
                placeholder="Podaj nazwisko">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>

        <div class="form-group">
            <label for="username">Imie:</label>
            <input type="text" class="form-control" id="username" aria-describedby="usernameHelp"
                placeholder="Podaj nick">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Podaj email">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            <label for="email2">Potwierdź email:</label>
            <input type="email2" class="form-control" id="email2" aria-describedby="email2Help"
                placeholder="Potwierdź email">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>

        <div class="form-group">
            <label for="password">Hasło:</label>
            <input type="password" class="form-control" id="password" placeholder="Podaj hasło">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            <label for="password2">Potwierdź hasło:</label>
            <input type="password2" class="form-control" id="password2" placeholder="Potwierdź hasło">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>

        <button type="submit" class="btn btn-primary">Zarejestruj</button>
    </form>



    <div>

        <?php require('includes/footer.php') ?>