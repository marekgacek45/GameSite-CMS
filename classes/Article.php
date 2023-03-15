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

    public static function getByID($conn, $id, $columns = "*")
    {

        $sql = "SELECT $columns FROM article WHERE id = :id ";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');

        if ($stmt->execute()) {
            return $stmt->fetch();
        }

    }


    public function create($conn)
    {
        $sql = "INSERT INTO article(title,content)
        VALUES ( :title,:content)";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
        $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $this->id = $conn->lastInsertId();
            return true;
        }


    }


}

?>