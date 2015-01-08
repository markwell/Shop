<?php
class Controller_Login extends Controller
{
    function __construct()
    {
        $this->model = new Model_Login();
        $this->view  = new View();
    }
    function action_index()
    {
        $this->view->generate('login_view.php', 'template_view.php');
    }
    function action_authUser()
    {
        if (isset($_POST['submit'])) {
            $error = $this->model->checkAndAuthUser($_POST['login'], $_POST['password']);
            if (is_null($error)) {
                header('Location:/shop/login/checkUser');
            } else {
                $this->view->generate('login_view.php', 'template_view.php', $error);
            }
        }
    }
    function action_checkUser()
    {
        $userdata = $this->model->getHashAndID(intval($_COOKIE['id']));
        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
            if (($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])) {
                setcookie("id", "", time() - 3600 * 24 * 30 * 12, "/");
                setcookie("hash", "", time() - 3600 * 24 * 30 * 12, "/");
                $message = "Что-то пошло не так. Попробуйте зайти еще раз.";
            } else {
                $message = "Привет, ".$userdata['user_login'].". Все отлично!";
            }
        } else {
                $message = "Пожалуйста, включите куки.";
        }
        $this->view->generate('login_view.php', 'template_view.php', $message);
    }
}