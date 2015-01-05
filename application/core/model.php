<?php

class Model
{
	public function db_connect()
	{
		   # Соединямся с БД
		try {  
          $DBH = new PDO("mysql:host=localhost;dbname=users", 'root', '');  
          $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
          // $DBH->prepare('SELECT user_login FROM users')->execute();  
        }  
        catch(PDOException $e) {  
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);  
            return $err = "Houston, we have a problem.";  
        }
	}
	
	// метод выборки данных
	public function get_data()
	{
		// todo
	}
}