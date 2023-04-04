<?php

class User
{

    public $id;
    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $password;
    public $errors = [];


    public function checkEmail($conn){
        $sql = "SELECT email FROM users WHERE email=:email";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        if($stmt->execute()){
            return $stmt->fetch();
        }
        
    }

    public function register($conn)
    {
        $sql = "INSERT INTO users(first_name,last_name,username,email,password)
        VALUES ( :first_name,:last_name,:username,:email,:password)";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':first_name', $this->first_name, PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $this->last_name, PDO::PARAM_STR);
        $stmt->bindValue(':username', $this->username, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->password, PDO::PARAM_STR);

        $stmt->execute();
    }


}

?>