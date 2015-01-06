<?php
class Controller_Register extends Controller
{

    function __construct()
    {
        $this->model = new Model_Register($DBH);
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
            $this->model->db_connect();
            $data = $this->model->get_data();
            $this->view->generate($data, 'template_view.php');
        }
    }
}
