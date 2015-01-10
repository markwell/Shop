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
    function action_getItemsAndShow()
    {
        function pagination($count_pages, $active = 1, $count_show_pages = 5)
        {
            if ($count_pages > 1) 
            { // Всё это только если количество страниц больше 1
              /* Дальше идёт вычисление первой выводимой страницы и последней (чтобы текущая страница была где-то посредине, если это возможно, и чтобы общая сумма выводимых страниц была равна count_show_pages, либо меньше, если количество страниц недостаточно) */
              $left = $active - 1;
              $right = $count_pages - $active;
              if ($left < floor($count_show_pages / 2)) $start = 1;
              else $start = $active - floor($count_show_pages / 2);
              $end = $start + $count_show_pages - 1;
              if ($end > $count_pages) {
                $start -= ($end - $count_pages);
                $end = $count_pages;
                if ($start < 1) $start = 1;
                return array('start' => $start, 'end' => $end);
              }
            }
        }
    	$items = $this->model->getItems();
        $StartAndEndPagination = $this -> pagination(count($items), $_GET['page']);
        $url = "/pagination/index.php";
        $url_page = "/pagination/index.php?page=";
        $this->view->generate('items_view.php', 'template_view.php', array('items' => $items,'pagination' => $pagination));
    }
}
