<?php

$conn = require('includes/database.php');
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {

  $username = $_POST['username'];
  $_SESSION['logged'] = $username;
  $password = $_POST['password'];


  if (Administration::Auth($conn, $username, $password)) {

    Authentication::loginAdmin();
    header('Location:admin/index.php');

  } elseif (User::UserAuth($conn, $username, $password)) {
    Authentication::login();
    header('Location:index.php');


  } else {
    echo 'wprowadzone dane są nieprawidłowe';
  }
}
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zaloguj się</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">

          <form action='index.php' method="post" id="login">
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