<?php

class Article
{
    public $id;
    public $title;
    public $content;
    public $errors = [];


    protected function validate()
    {
        if ($this->title == '') {
            array_push($this->errors, 'wprowadź tytuł');
        }
        if ($this->content == '') {
            array_push($this->errors, 'wprowadź treść');
        }

        return empty($this->errors);
    }

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
        if ($this->validate()) {
            $sql = "INSERT INTO article(title,content)
        VALUES ( :title,:content)";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
            $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $this->id = $conn->lastInsertId();
                return true;
            }
        } else {
            return false;
        }

    }

    public function edit($conn)
    {

        if ($this->validate()) {
            $sql = "UPDATE article SET title =:title, content=:content
    WHERE id = :id";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
            $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $this->id = $conn->lastInsertId();
                return true;
            }
        } else {
            return false;
        }

    }

    public function delete($conn)
    {
        $sql = "DELETE FROM article WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);

        return $stmt->execute();

    }

public static function getPage($conn,$limit,$offset){
    $sql = "SELECT * FROM article ORDER BY id LIMIT :limit OFFSET :offset";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset',$offset, PDO::PARAM_INT);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public static function getTotal($conn){
    return $conn->query('SELECT COUNT(*) FROM article')->fetchColumn();
}

public function setImage($conn,$filename){
    $sql='UPDATE article SET thumbnail = :image_file WHERE id=:id';

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
    $stmt->bindValue(':image_file', $filename, $filename ==null ? PDO::PARAM_NULL : PDO::PARAM_STR);

    return $stmt->execute();
    
}

}

?>