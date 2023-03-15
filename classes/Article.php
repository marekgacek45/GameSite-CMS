<?php

class Article
{
    public $id;
    public $title;
    public $content;

    public static function getAll($conn)
    {

        $sql = "SELECT * from article";


        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);

    }

}





?>