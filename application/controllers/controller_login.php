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
    function action_auth()
    {
        if (isset($_POST['submit'])) {
            $data = $this->model->get_data();
            $this->view->generate($data, 'template_view.php');
        }
    }
}