<?


class Model_Login extends Model
{
    
    public function get_data()
    {

        # Функция для генерации случайной строки
        $error = "";
        function generateCode($length=6) {

            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIFJKLMNOPRQSTUVWXYZ0123456789";

            $code = "";

            $clen = strlen($chars) - 1;  
            while (strlen($code) < $length) {

                    $code .= $chars[mt_rand(0,$clen)];  
            }

            return $code;

        }



     

            # Вытаскиваем из БД запись, у которой логин равняеться введенному

            $query = mysql_query("SELECT user_id, user_password FROM users WHERE user_login='".$_POST['login']."' LIMIT 1");

            $data = mysql_fetch_assoc($query);

            

            # Сравниваем пароли

            if($data['user_password'] === md5(md5($_POST['password'])))

            {

                # Генерируем случайное число и шифруем его

                $hash = md5(generateCode(10));

                

                # Записываем в БД новый хеш авторизации 

                mysql_query("UPDATE users SET user_hash='".$hash."' WHERE user_id='".$data['user_id']."'");

                

                # Ставим куки

                setcookie("id", $data['user_id'], time()+60*60*24*30);

                setcookie("hash", $hash, time()+60*60*24*30);

                

                # Переадресовываем браузер на страницу проверки нашего скрипта

                header("Location: check"); 
                

            }

            else

            {
                return "Неправильный пароль";

            }

        
                include "login.html";

    }
}
?>