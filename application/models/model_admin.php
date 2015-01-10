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
}