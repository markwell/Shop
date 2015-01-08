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
            if (!$error) {
                $this->view->generate("main_view.php", 'template_view.php');
            } else {
                $this->view->generate('login_view.php', 'template_view.php', $error);
            }
        }
    }
}