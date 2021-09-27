<?php

class Type {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getCount() {
        $query = $this->con->prepare('SELECT COUNT(*) as count FROM news_type');
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return $row['count'];
    }

    public function getTypes() {
        $query = $this->con->prepare('SELECT * FROM news_type');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isExist($type) {
        $query = $this->con->prepare('SELECT id FROM news_type WHERE type=:type');
        $query->execute(array(':id' => $this->id));
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return $row['count'];
    }

    public function getNewsCount($id) {
        $query = $this->con->prepare('SELECT COUNT(id) as count FROM news WHERE type=:id');
        $query->execute(array(':type' => $id));
        $query->fetch(PDO::FETCH_ASSOC);
        return $row['howMany'];
    }

    public function createType($type) {
        $query = $this->con->prepare('INSERT INTO news_type (type) VALUES (:type)');
        $query->execute(array(':type' => $type));
        return $query->rowCount();
    }

    public function updateType() {
        $query = $this->con->prepare('DELETE FROM news_type WHERE id=:id');
        $query->execute(array(':id' => $this->id));
        return $query->rowCount();
    }

    public function deleteType() {
        $query = $this->con->prepare('DELETE FROM news_type WHERE id=:id');
        $query->execute(array(':id' => $this->id));
        return $query->rowCount();
    }

}

?>
