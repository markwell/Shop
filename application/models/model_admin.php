<?php
class Model_Admin extends Model
{
    public function __construct()
    {
        $this->db_connect();
    }
    public function getAll()
    {
        $query = $this->DBH->prepare("SELECT * FROM item");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        // print_r($result);
        // break;
        return $result;
    }
}