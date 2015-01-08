<?php

class Model_Register extends Model
{
	
	public function __construct() {
		$this->db_connect();
	}
	
	public function checkAndAddUser()
	{	
			// чтобы работало подключение к БД делаем так

		$err = array();


		if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))

		{

			$err[] = "Username can only consist of letters of the alphabet and numbers";

		}



		if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)

		{

			$err[] = "Username must be at least 3 characters and no more than 30";

		}



		    # проверяем, не сущестует ли пользователя с таким именем

		$query = $this->DBH->prepare("SELECT COUNT(user_id) FROM users WHERE user_login=:user_login");
		$query->bindParam("user_login", $_POST['login']);
		
		if($query->fetchall() == nil) 
		{

			$err[] = "A user with this username already exists in the database";

		}

		$password = md5($_POST['password']);
		$repeat = md5($_POST['repass']);
		if($password != $repeat)
		{

			$err[] = "Passwords do not match! Please try again!";

		}


		    # Если нет ошибок, то добавляем в БД нового пользователя

		if(count($err) == 0)

		{


			$login = $_POST['login'];



		        # Убераем лишние пробелы и делаем двойное шифрование

			$password = md5(md5(trim($_POST['password'])));



			$query = $this->DBH->prepare("INSERT INTO users SET user_login=:login, user_password=:password");
			$query->bindParam(":login", $login);
			$query->bindParam(":password", $password);
			$query->execute();

			return null;

		}


		return $err;
	}

}
