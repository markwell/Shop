<?php
class Model_Admin extends Model
{
    public function __construct()
    {
        $this->db_connect();
    }
    public function getItems()
    {

        $query = $this->DBH->prepare("SELECT * FROM item");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getCategoryItems($category)
    {
        
        $query = $this->DBH->prepare("SELECT * FROM item WHERE category_id = :category");
        $query->bindParam(':category', $category);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}