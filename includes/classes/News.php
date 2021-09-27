<?php

class News {

    private $con;
    private $id;
    private $short;
    private $full;
    private $visible;
    private $type;
    private $typeName;
    private $created_at;
    private $updated_at;
    private $visible_at;

    public function __construct($con, $id) {
        $this->con = $con;
        $this->id = $id;

        $query = $this->con->prepare('SELECT news.*, news_type.type as typeName 
                            FROM news JOIN news_type 
                            WHERE news.type=news_type.id AND news.id=:id');
        $query->execute(array(':id' => $this->id));
        $newsData = $query->fetch(PDO::FETCH_ASSOC);

        $this->short = $newsData['short'];
        $this->full = $newsData['full'];
        $this->visible = $newsData['visible'];
        $this->type = $newsData['type'];
        $this->typeName = $newsData['typeName'];
        $this->created_at = $newsData['created_at'];
        $this->updated_at = $newsData['updated_at'];
        $this->visible_at = $newsData['visible_at'];
    }

    public function getId() {
        return $this->id;
    }

    public function getShort() {
        return $this->short;
    }

    public function getFull() {
        return $this->full;
    }

    public function getVisible() {
        return $this->visible;
    }

    public function getType() {
        return $this->type;
    }

    public function getTypeName() {
        return $this->typeName;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function getVisibleAt() {
        return $this->visible_at;
    }

    public function deleteNews() {
        $query = $this->con->prepare('DELETE FROM news WHERE id=:id');
        $query->execute(array(':id' => $this->id));
        return $query->rowCount();
    }

}

?>
