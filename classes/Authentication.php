<?php 

class Authentication {

    public static function login(){
        session_regenerate_id(true);

        $_SESSION['is_logged_in'] = true;
    }
}

?>