<?php

class Authentication
{
    public static function loginAdmin()
    {
        session_regenerate_id(true);

        // $_SESSION['is_logged_in'] = true;
        $_SESSION['admin_is_logged_in'] = true;

        $_SESSION['username'] = $_POST['username'];
    }


    public static function login()
    {
        session_regenerate_id(true);

        $_SESSION['logged'] = true;

        $_SESSION['username'] = $_POST['username'];
    }


    public static function logout()
    {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }

    public static function isLoggedIn()
    {

        return (isset($_SESSION['admin_is_logged_in']) && $_SESSION['admin_is_logged_in']);

    }

    // public static function requireLogin(){
    public static function requireLoginAdmin(){
        if(!static::isLoggedIn){
            die('Nie posiadasz uprawnień');
        }
    }
}


?>