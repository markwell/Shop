<?


class Model_Login extends Model
{

    protected $dbh;
    public function __construct($dbh) {
    $this->dbh = $dbh;
    }

    # Функция для генерации случайной строки
    public function generateCode($length=6) {

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIFJKLMNOPRQSTUVWXYZ0123456789";

        $code = "";

        $clen = strlen($chars) - 1;  
        while (strlen($code) < $length) {

                $code .= $chars[mt_rand(0,$clen)];  
        }

        return $code;

    }

    public function get_data()
    {

        
        $error = "";
        
            # Вытаскиваем из БД запись, у которой логин равняеться введенному

            $query = $this->dbh->prepare("SELECT user_id, user_password FROM users WHERE user_login=:login LIMIT 1");
            $query->bindParam(':login', $_POST['login']);
            $query->execute();

            $data = $query->fetchAll();

            

            # Сравниваем пароли

            if($data['user_password'] === md5(md5($_POST['password'])))

            {

                # Генерируем случайное число и шифруем его

                $hash = md5(generateCode(10));

                

                # Записываем в БД новый хеш авторизации 

                $query = $this->dbh->prepare("UPDATE users SET user_hash=:hash WHERE user_id=:id");
                $query->bindParam(':hash', $_POST['login']);
                $query->bindParam(':id', $data['user_id']);
                $query->execute();

                

                # Ставим куки

                setcookie("id", $data['user_id'], time()+60*60*24*30);

                setcookie("hash", $hash, time()+60*60*24*30);

                

                # Переадресовываем браузер на страницу проверки нашего скрипта

                header("Location: main"); 
                

            }

            else

            {
                $error = "Неправильный пароль";

            }

        
                

    }
}
?>