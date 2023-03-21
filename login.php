<?php

$conn = require('includes/database.php');
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $error = '';

    if (Administration::Auth($conn, $username, $password)) {

        Authentication::login();
       
        header('Location:admin/index.php');
    } else {
      $error = 'wprowadzone dane są nieprawidłowe';
    }
}
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zaloguj się</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container">
    <form method="post" id="login">
  <div class="mb-3">
    <label for="eusername" class="form-label">Nazwa użytkownika:</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Hasło:</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
 
</form>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cofnij</button>
        <button type="submit" form="login" class="btn btn-primary">Wyślij</button>
      </div>
    </div>
  </div>
</div>


