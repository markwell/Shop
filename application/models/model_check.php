<?
class Model_Check extends Model
{
    function __construct()
    {
        $this->model->db_connect();
    }
    function getHashAndID($userID)
    {
        $query = $DBH->prepare("SELECT * FROM users WHERE user_id=:id LIMIT 1");
        $query->bindParam(':id', $userID));
        $query->execute();
        $userdata = $query->fetch(PDO::FETCH_ASSOC);
        return $userdata;
    }
}
?>

