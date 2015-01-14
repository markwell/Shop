<?
class Model_Login extends Model
{
    public function __construct()
    {
        $this->db_connect();
    }
    # Функция для генерации случайной строки
    public function generateCode($length = 6)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIFJKLMNOPRQSTUVWXYZ0123456789";
        $code  = "";
        $clen  = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0, $clen)];
        }
        return $code;
    }
    public function checkAndAuthUser($login, $password)
    {
        $error = "";
        # Вытаскиваем из БД запись, у которой логин равняеться введенному
        $query = $this->DBH->prepare("SELECT user_id, user_password FROM users WHERE user_login=:login LIMIT 1");
        $query->bindParam(':login', $login);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);
        # Сравниваем пароли
        /*echo ($data['user_password'].'<br>');
        echo md5(md5(md5($password)));
        break;*/
        if ($data['user_password'] === md5(md5(md5($password)))) {
            # Генерируем случайное число и шифруем его
            $hash  = md5($this->generateCode(10));
            # Записываем в БД новый хеш авторизации 
            $query = $this->DBH->prepare("UPDATE users SET user_hash=:hash WHERE user_id=:id");
            $query->bindParam(':hash', $hash);
            $query->bindParam(':id', $data['user_id']);
            $query->execute();
            # Ставим куки
            setcookie("id", $data['user_id'], time() + 60 * 60 * 24 * 30);
            setcookie("hash", $hash, time() + 60 * 60 * 24 * 30);
            return null;
        } else {
            
            $error = "Неправильные имя пользователя или пароль. Пожалуйста, попробуйте еще раз.";
            return $error;
        }
    }
    public function getHashAndID($userID)
    {
        $query = $this->DBH->prepare("SELECT * FROM users WHERE user_id=:id LIMIT 1");
        $query->bindParam(':id', $userID);
        $query->execute();
        $userdata = $query->fetch(PDO::FETCH_ASSOC);
        return $userdata;
    }
    public function addItemToOrder($user_id, $item_id)
    {
        $query = $this->DBH->prepare("INSERT INTO orders SET user_id=:user_id, item_id=:item_id");
        $query->bindParam(':user_id', $user_id);
        $query->bindParam(':item_id', $item_id);
        $query->execute();
    }
    public function deleteItemFromOrder($user_id, $item_id)
    {
        $query = $this->DBH->prepare("DELETE FROM orders WHERE user_id=:user_id, item_id=:item_id");
        $query->bindParam(':user_id', $user_id);
        $query->bindParam(':item_id', $item_id);
        $query->execute();
    }
    public function getItems()
    {
        $query = $this->DBH->prepare("SELECT * FROM item");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
     public function getOrderItems($user_id)
    {
        $query = $this->DBH->prepare("SELECT * FROM item WHERE id IN (SELECT item_id FROM orders WHERE user_id =:user_id )");
        $query->bindParam(':user_id', $user_id);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
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
?>