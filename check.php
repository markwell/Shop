<?

// Скрипт проверки


# Соединямся с БД

try {  
  $DBH = new PDO("mysql:host=localhost;dbname=users", 'root', '');  
  $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
  // $DBH->prepare('SELECT user_login FROM users')->execute();  
}  
catch(PDOException $e) {  
    echo "Houston, we have a problem.";  
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);  
}


if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))

{   

    $query = $DBH->prepare("SELECT * FROM users WHERE user_id=:id LIMIT 1");
    $query->bindParam(':id', intval($_COOKIE['id']));
    $query->execute();
    $userdata = $query->fetchAll();
    

    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id']))

    {

        setcookie("id", "", time() - 3600*24*30*12, "/");

        setcookie("hash", "", time() - 3600*24*30*12, "/");

        print "Some error!";

    }

    else

    {

        print "Hello, ".$userdata['user_login'].". All good!";

    }

}

else

{

    print "Please, cookie on!";

}

?>
