<?php
class Controller_Admin extends Controller
{
	function __construct()
	{
	    $this->model = new Model_Admin();
	    $this->view  = new View();
	}
    function action_index()
    {
        $this->view->generate('items_view.php', 'template_view.php');
    }
    function action_getAllItems()
    {
    	$items = $this->model->getAll();
        $this->view->generate('items_view.php', 'template_view.php', $items);
    }

}
