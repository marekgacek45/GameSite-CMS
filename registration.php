<?php

require('includes/header.php');

$user = new User();

if ($_SERVER["REQUEST_METHOD"] === "POST" || isset($_POST["register_button"])) {

    //first name
    $user->first_name = strip_tags($_POST['first_name']);
    $user->first_name = str_replace(' ', '', $user->first_name);
    $user->first_name = ucfirst(strtolower($user->first_name));
    $user->first_name =$_SESSION['first_name']  ;

    //last name
    $user->last_name = strip_tags($_POST['last_name']);
    $user->last_name = str_replace(' ', '', $user->last_name);
    $user->last_name = ucfirst(strtolower($user->last_name));
    $_SESSION['last_name'] = $user->last_name;

    //username
    $user->username = strip_tags($_POST['username']);
    $user->username = str_replace(' ', '', $user->username);
    $_SESSION['username'] = $user->username;

    //email
    $user->email = strip_tags($_POST['email']);
    $user->email = str_replace(' ', '', $user->email);

    //email2
    $email2 = strip_tags($_POST['email2']);
    $email2 = str_replace(' ', '', $email2);

    //password
    $user->password = strip_tags($_POST['password']);
    $user->password = str_replace(' ', '', $user->password);

if(strlen($user->first_name) <=1){
    array_push($user->errors,'Imię jest za krótkie');
}



if($user->email == $email2){
    if($user->checkEmail($conn)){
        echo 'podany email istnieje ';
    }
}else{
    echo'maile nie są takie same';
}







    $conn = require('includes/database.php');

    $user->register($conn);

var_dump($user);

}

?>
<div class="container d-flex flex-column justify-content-center align-items-center" style="margin-top:2em">
    <h2>Rejestracja nowego użytkownika</h2>

    <form method="POST">
        <!-- <label for="first_name">Imie:</label>
        <input name="first_name" id="first_name" type="text"> -->
        <label for="last_name">Nazwisko:</label>
        <input name="last_name" id="last_name" type="text">
        <label for="username">Nazwa użytkownika:</label>
        <input name="username" id="username" type="text">
        <div>
            <label for="email">Email:</label>
            <input name="email" id="email" type="email">
            <label for="email2">Potwierdź email:</label>
            <input name="email2" id="email2" type="email">
        </div>
        <div>
            <label for="password">Hasło:</label>
            <input name="password" id="password" type="password">
        </div>
        <!-- <button type="submit" name="register_button">Wyślij</button> -->
    </form>
    <div>




    <form method="POST">
  <div class="mb-3">
    <label for="first_name" class="form-label">Imię:</label>
    <input name="first_name" id="first_name" type="text" class="form-control" aria-describedby="firstNameHelp" value="koza">
<?php if(in_array('Imię jest za krótkie',$user->errors)) : ?>
    <div id="firstNameHelpHelp" class="form-text">Imię jest za krótkie.</div>
<?php endif?>


    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="register_button" class="btn btn-primary">Rejestracja</button>
</form>





        <?php require('includes/footer.php') ?>