<?php

require('includes/header.php');

$user = new User();

if ($_SERVER["REQUEST_METHOD"] === "POST" || isset($_POST["register_button"])) {

  $conn = require('includes/database.php');

  //first name
  $user->first_name = strip_tags($_POST['first_name']);
  $user->first_name = str_replace(' ', '', $user->first_name);
  $user->first_name = ucfirst(strtolower($user->first_name));

  //last name
  $user->last_name = strip_tags($_POST['last_name']);
  $user->last_name = str_replace(' ', '', $user->last_name);
  $user->last_name = ucfirst(strtolower($user->last_name));


  //username
  $user->username = strip_tags($_POST['username']);
  $user->username = str_replace(' ', '', $user->username);

  //email
  $user->email = strip_tags($_POST['email']);
  $user->email = str_replace(' ', '', $user->email);

  //email2
  $email2 = strip_tags($_POST['email2']);
  $email2 = str_replace(' ', '', $email2);

  //password
  $user->password = strip_tags($_POST['password']);
  $user->password = str_replace(' ', '', $user->password);

  //password2
  $password2 = strip_tags($_POST['password2']);
  $password2 = str_replace(' ', '', $password2);

  //first name validation
  if (strlen($user->first_name) <= 1) {
    array_push($user->errors, 'Imię musi się składać z minimum 2 liter');
  }
  if (strlen($user->first_name) >= 50) {
    array_push($user->errors, 'Imię może składać się z maksymalnie 50 liter');
  }
  if (!ctype_alpha($user->first_name)) {
    array_push($user->errors, 'Imię może składać się wyłącznie z liter');
  }

  //last name validation
  if (strlen($user->last_name) <= 1) {
    array_push($user->errors, 'Nazwisko musi się składać z minimum 2 liter');
  }
  if (strlen($user->last_name) >= 50) {
    array_push($user->errors, 'Nazwisko może się składać z maksymalnie 50 znaków');
  }
  if (!preg_match('/^[a-zA-Z]+(-?[a-zA-Z]+)?$/', $user->last_name)) {
    array_push($user->errors, 'Nazwisko może się składać wyłącznie z liter oraz znaku " - "');
  }

  //username validation
  if (strlen($user->username) <= 5) {
    array_push($user->errors, 'Nazwa użytkownika musi składać się minium z 5 znaków');
  }
  if ($user->checkUsername($conn)) {
    array_push($user->errors, 'Podana nazwa użytkownika już istnieje');
  }

  //email validation
  if ($user->checkEmail($conn)) {
    array_push($user->errors, 'Podany email został już użyty do założenia konta');
  }
  if ($user->email != $email2) {
    array_push($user->errors, 'Maile nie są zgodne');
  }
  if ((!filter_var($user->email, FILTER_VALIDATE_EMAIL))) {
    array_push($user->errors, 'Podany format adresu email nie jest prawidłowy');
  }

  //password validation
  if (!(strlen($user->password) >= 8 && preg_match('/[A-Z]+/', $user->password) && preg_match('/[0-9]+/', $user->password) && preg_match('/[^a-zA-Z0-9]+/', $user->password))) {
    array_push($user->errors, 'Hasło musi się składać z min. 8 liter oraz zawierać min. jedną duża literę, jeden znak specjalny oraz jedną cyfrę');
  }
  if ($user->password != $password2) {
    array_push($user->errors, 'Hasła się nie zgadzają');
  }


  if (empty($user->errors)) {
    $user->register($conn);
    //header trzeba zrobić do logowania albo coś
  }
}

?>
<div class="container d-flex flex-column justify-content-center align-items-center" style="margin-top:2em">
  <h2>Rejestracja nowego użytkownika</h2>




  <form method="POST">
    <!-- FIRST NAME-->
    <div class="mb-3">
      <label for="first_name" class="form-label">Imię:</label>
      <input name="first_name" id="first_name" type="text" class="form-control" aria-describedby="firstNameHelp"
        placeholder="Podaj imię" value="<?= $user->first_name ?>">
      <?php if (in_array('Imię musi się składać z minimum 2 liter', $user->errors)): ?>
        <div id="firstNameHelp" class="form-text" style="color:red">Imię musi się składać z minimum 2 liter.</div>
      <?php elseif ((in_array('Imię może składać się z maksymalnie 50 liter', $user->errors))): ?>
        <div id="firstNameHelp" class="form-text" style="color:red">Imię może składać się z maksymalnie 50 liter.</div>
      <?php elseif ((in_array('Imię może składać się wyłącznie z liter', $user->errors))): ?>
        <div id="firstNameHelp" class="form-text" style="color:red">Imię może składać się wyłącznie z liter.</div>
      <?php endif ?>
    </div>
    <!-- LAST NAME-->
    <div class="mb-3">
      <label for="last_name" class="form-label">Nazwisko:</label>
      <input name="last_name" id="last_name" type="text" class="form-control" aria-describedby="lastNameHelp"
        placeholder="Podaj nazwisko" value="<?= $user->last_name ?>">
      <?php if (in_array('Nazwisko musi się składać z minimum 2 liter', $user->errors)): ?>
        <div id="lastNameHelp" class="form-text">Nazwisko musi się składać z minimum 2 liter.</div>
      <?php elseif ((in_array('Nazwisko może składać się z maksymalnie 50 znaków', $user->errors))): ?>
        <div id="lastNameHelp" class="form-text">Nazwisko może składać się z maksymalnie 50 znaków.</div>
      <?php elseif ((in_array('Nazwisko może się składać wyłącznie z liter oraz znaku " - "', $user->errors))): ?>
        <div id="lastNameHelp" class="form-text">Nazwisko może się składać wyłącznie z liter oraz znaku " - ".</div>
      <?php endif ?>
    </div>
    <!-- USERNAME-->
    <div class="mb-3">
      <label for="username" class="form-label">Nazwa użytkownika:</label>
      <input name="username" id="username" type="text" class="form-control" aria-describedby="usernameHelp"
        placeholder="Podaj nazwę użytkownika" value="<?= $user->username ?>">
      <?php if (in_array('Nazwa użytkownika musi składać się minium z 5 znaków', $user->errors)): ?>
        <div id="usernameNameHelp" class="form-text">Nazwa użytkownika musi składać się minium z 5 znaków.</div>
      <?php elseif ((in_array('Podana nazwa użytkownika już istnieje', $user->errors))): ?>
        <div id="usernameNameHelp" class="form-text">Podana nazwa użytkownika już istnieje.</div>
      <?php endif ?>
    </div>
    <!-- EMAIL-->
    <div class="mb-3">
      <label for="email" class="form-label">Email:</label>
      <input name="email" id="email" type="email" class="form-control" aria-describedby="emailHelp"
        placeholder="Podaj email " placeholder="Podaj email" value="<?= $user->email ?>">
      <?php if (in_array('Podany email został już użyty do założenia konta', $user->errors)): ?>
        <div id="emailHelp" class="form-text">Podany email został już użyty do założenia konta.</div>
      <?php elseif ((in_array('Podany format adresu email nie jest prawidłowy', $user->errors))): ?>
        <div id="emailHelp" class="form-text">Podany format adresu email nie jest prawidłowy.</div>
      <?php endif ?>
    </div>
    <!-- CONFIRM EMAIL-->
    <div class="mb-3">
      <label for="email2" class="form-label">Potwierdź email:</label>
      <input name="email2" id="email2" type="email" class="form-control" aria-describedby="email2Help"
        placeholder="Potwierdź email" value="<?php if (isset($email2))
          echo $email2; ?>">
      <?php if ((in_array('Maile nie są zgodne', $user->errors))): ?>
        <div id="email2Help" class="form-text">Maile nie są zgodne.</div>
      <?php endif ?>
    </div>
    <!-- PASSWORD-->
    <div class="mb-3">
      <label for="password" class="form-label">Hasło:</label>
      <input name="password" id="password" type="password" class="form-control" aria-describedby="passwordHelp"
        placeholder="Podaj hasło">
      <?php if ((in_array('Hasło musi się składać z min. 8 liter oraz zawierać min. jedną duża literę, jeden znak specjalny oraz jedną cyfrę', $user->errors))): ?>
        <div id="passwordHelp" class="form-text">Hasło musi się składać z min. 8 liter oraz zawierać min. jedną duża
          literę, jeden znak specjalny oraz jedną cyfrę.</div>
      <?php elseif ((in_array('Hasła się nie zgadzają', $user->errors))): ?>
        <div id="passwordHelp" class="form-text">Hasła się nie zgadzają.</div>
      <?php endif ?>
    </div>
    <!--CONFIRM PASSWORD-->
    <div class="mb-3">
      <label for="password2" class="form-label">Powtórz hasło:</label>
      <input name="password2" id="password2" type="password" class="form-control" aria-describedby="password2Help"
        placeholder="Powtórz hasło">
    </div>

    <button type="submit" name="register_button" class="btn btn-primary">Rejestracja</button>
  </form>





  <?php require('includes/footer.php') ?>