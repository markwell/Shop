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
}
?>