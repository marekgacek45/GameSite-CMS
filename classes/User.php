<?php

class User
{

    public $id;
    public $first_name;
    public $last_name;
    public $username;


    public function register($conn)
    {
        $sql = "INSERT INTO users(first_name,last_name,username)
        VALUES ( :first_name,:last_name,:username)";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':first_name', $this->first_name, PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $this->last_name, PDO::PARAM_STR);
        $stmt->bindValue(':username', $this->username, PDO::PARAM_STR);

        $stmt->execute();
    }


}

?>