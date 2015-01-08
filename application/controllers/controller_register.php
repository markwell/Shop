<?php
class Controller_Register extends Controller
{

    function __construct()
    {
        $this->model = new Model_Register();
        $this->view = new View();
    }
    
    function action_index()
    {
        
            $this->view->generate('register_view.php', 'template_view.php');
      
    }

    function action_newuser()
    {
    if(isset($_POST['submit'])) 
        {

            $error = $this->model->checkAndAddUser($_POST['login'],$_POST['password'],$_POST['repass']);
            if (count($error) == 0) {
                $this->view->generate("main_view.php", 'template_view.php');

            }
            else{
                $this->view->generate('register_view.php', 'template_view.php', array('error' => $error));
            }
        }
    }
}
