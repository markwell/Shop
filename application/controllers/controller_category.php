<?php
class Controller_Category extends Controller
{
    function action_index()
    {
        $this->view->generate('category_view.php', 'template_view.php');
    }
}
