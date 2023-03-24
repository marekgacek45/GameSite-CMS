<?php

class Game
{
    public $title;

    public static function getAll($conn)
    {

        $sql = "SELECT * from game";


        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);

    }
}
?>