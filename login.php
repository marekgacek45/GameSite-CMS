<?php
// require('includes/init.php');
require('includes/header.php');
$conn = require('includes/database.php');
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];
    if (Administration::Auth($conn, $username, $password)) {

        Authentication::login();
       
        header('Location:index.php');
    } else {
        echo 'wprowadzone dane są nieprawidłowe';
    }
}
?>
<div class="container">
    <h2>login</h2>
    <form method="post">

        <div class="container">
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="container">
            <label for="password">Hasło:</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Wyślij</button>
    </form>
</div>


<?php require('includes/footer.php') ?>