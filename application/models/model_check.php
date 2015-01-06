<?

class Model_Check extends Model
{
	
	function __construct()
	    {
	        $this->model->db_connect();
	    }

	function get_data()
		{
			$query = $DBH->prepare("SELECT * FROM users WHERE user_id=:id LIMIT 1");
			$query->bindParam(':id', intval($_COOKIE['id']));
			$query->execute();
			$userdata = $query->fetchAll();
		}

}

?>

