<?php

require('includes/header.php');

$user = new User();

if ($_SERVER["REQUEST_METHOD"] === "POST" || isset($_POST["register_button"])) {

  $conn = require('includes/database.php');

  //first name
  $user->first_name = strip_tags($_POST['first_name']);
  $user->first_name = str_replace(' ', '', $user->first_name);
  $user->first_name = ucfirst(strtolower($user->first_name));
  // $user->first_name =$_SESSION['first_name']  ;


  //last name
  $user->last_name = strip_tags($_POST['last_name']);
  $user->last_name = str_replace(' ', '', $user->last_name);
  $user->last_name = ucfirst(strtolower($user->last_name));
  // $_SESSION['last_name'] = $user->last_name;

  //username
  $user->username = strip_tags($_POST['username']);
  $user->username = str_replace(' ', '', $user->username);
  // $_SESSION['username'] = $user->username;

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
    array_push($user->errors, 'Imię jest za krótkie');
  }

  //last name validation
  if (strlen($user->last_name) <= 1) {
    array_push($user->errors, 'Nazwisko jest za krótkie');
  }

  //username validation
  if (strlen($user->username) <= 5) {
    array_push($user->errors, 'Nazwa użytkownika musi składać się minium z 5 znaków');
  }

  //email validation
  if ($user->email == $email2) {
    if ($user->checkEmail($conn)) {
      array_push($user->errors, 'Podany email został już użyty do założenia konta');
    }
  } else {
    array_push($user->errors, 'Maile nie są zgodne');
  }

  //password validation

  if ($user->password != $password2) {
    array_push($user->errors, 'Hasła się nie zgadzają');
  }






  if (empty($user->errors)) {
    $user->register($conn);
  }



}

?>
<div class="container d-flex flex-column justify-content-center align-items-center" style="margin-top:2em">
  <h2>Rejestracja nowego użytkownika</h2>




  <form method="POST">

    <div class="mb-3">
      <label for="first_name" class="form-label">Imię:</label>
      <input name="first_name" id="first_name" type="text" class="form-control" aria-describedby="firstNameHelp" placeholder="Podaj imię"
        value="<?= $user->first_name ?>">
      <?php if (in_array('Imię jest za krótkie', $user->errors)): ?>
        <div id="firstNameHelp" class="form-text" style="color:red">Imię jest za krótkie.</div>
      <?php endif ?>
    </div>

    <div class="mb-3">
      <label for="last_name" class="form-label">Nazwisko:</label>
      <input name="last_name" id="last_name" type="text" class="form-control" aria-describedby="lastNameHelp" placeholder="Podaj nazwisko"
        value="<?= $user->last_name ?>">
      <?php if (in_array('Nazwisko jest za krótkie', $user->errors)): ?>
        <div id="lastNameHelp" class="form-text">Nazwisko jest za krótkie.</div>
      <?php endif ?>
    </div>

    <div class="mb-3">
      <label for="username" class="form-label">Nazwa użytkownika:</label>
      <input name="username" id="username" type="text" class="form-control" aria-describedby="usernameHelp" placeholder="Podaj nazwę użytkownika"
        value="<?= $user->username ?>">
      <?php if (in_array('Nazwa użytkownika jest za krótka', $user->errors)): ?>
        <div id="usernameNameHelp" class="form-text">Nazwa użytkownika jest za krótka.</div>
      <?php endif ?>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email:</label>
      <input name="email" id="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Podaj imię" placeholder="Podaj email"
        value="<?= $user->email ?>">
      <!-- trzeba wprowadzić walidacje-->
    </div>

    <div class="mb-3">
      <label for="email2" class="form-label">Potwierdź email:</label>
      <input name="email2" id="email2" type="email" class="form-control" aria-describedby="email2Help" placeholder="Potwierdź email" value="<?php if(isset($email2)) echo $email2;?>"  >
      <!-- trzeba wprowadzić walidacje i value i error-->
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Hasło:</label>
      <input name="password" id="password" type="password" class="form-control" aria-describedby="passwordHelp" placeholder="Podaj hasło"> 
      <!-- trzeba wprowadzić walidacje-->
    </div>

    <div class="mb-3">
      <label for="password2" class="form-label">Powtórz hasło:</label>
      <input name="password2" id="password2" type="password" class="form-control" aria-describedby="password2Help" placeholder="Powtórz hasło">
      <!-- trzeba wprowadzić walidacje i error-->
    </div>


    <button type="submit" name="register_button" class="btn btn-primary">Rejestracja</button>
  </form>





  <?php require('includes/footer.php') ?>