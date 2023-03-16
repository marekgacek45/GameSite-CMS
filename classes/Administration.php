<?php

class Administration
{

    public $id;
    public $username;
    public $password;

    public static function Auth($conn, $username, $password)
    {
        $sql = "SELECT * FROM administration WHERE username=:username";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':username', $username, PDO::PARAM_INT);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Administration');

        $stmt->execute();

        $admin = $stmt->fetch();

        if ($admin) {
            if ($password == $admin->password) {
                return true;
            }
        }

    }


}

?>