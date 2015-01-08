<?php
class Model_Register extends Model
{
    public function __construct()
    {
        $this->db_connect();
    }
    public function checkAndAddUser($login, $password, $repass)
    {
        $err = array();
        if (!preg_match("/^[a-zA-Z0-9]+$/", $login)) {
            $err[] = "Имя пользователя должно содержать только буквы и числа!";
        }
        if (strlen($login) < 3 or strlen($login) > 30) {
            $err[] = "Имя пользователся должно быть не меньше трех и не больше тридцати символов!";
        }
        # проверяем, не сущестует ли пользователя с таким именем
        $query = $this->DBH->prepare("SELECT COUNT(user_id) FROM users WHERE user_login=:login");
        $query->bindParam(":login", $login);
        $query->execute();
        $resultArray = $query->fetchcolumn();
        if ($resultArray > 0) {
            $err[] = "Пользователь с таким именем уже существует!";
        }
        $password = md5($password);
        $repeat   = md5($repass);
        if ($password != $repeat) {
            $err[] = "Пароли не совпадают! Попробуйте еще раз!";
        }
        # Если нет ошибок, то добавляем в БД нового пользователя
        if (count($err) == 0) {
            $login = $login;
            # Убераем лишние пробелы и делаем двойное шифрование
            $password = md5(md5(trim($password)));
            $query    = $this->DBH->prepare("INSERT INTO users SET user_login=:login, user_password=:password");
            $query->bindParam(":login", $login);
            $query->bindParam(":password", $password);
            $query->execute();
            return null;
        }
        return $err;
    }
}