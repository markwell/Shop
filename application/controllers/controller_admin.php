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
        // Функция расчитывает первый и последний элемент пагинации относительно текущего. Текущий элемент должен быть примерно по середине
        function StartAndEndPagination($count_pages, $active = 1, $count_show_pages = 5)
        {   
            if ($count_pages > 1) 
            { 
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
        $url = "/shop/admin/getitemsandshow?page=1"; //адрес первой страницы
        $url_page = "/shop/admin/getitemsandshow?page="; //адрес страницы с параметром page без значения на конце. 
        $active = $_GET['page']; //параметр активной страницы мы передаем функции с помощью глобального массива GET
    	  $items = $this->model->getItems(); //вытаскиваем все строки из бд
        $count_pages = count($items); //подсчитываем кол-во этих строк
        $StartAndEndPagination = StartAndEndPagination($count_pages, $active); //вычисляем первый и последний элемент пагинации
        $paginationData = array('count_pages' => $count_pages, 'active' => $active, 'url' => $url); //создаем массив для View
        array_push($paginationData, $StartAndEndPagination); //добавляем к предыдущему массиву массив со значениеми первого и последнего элемента пагинации
        
        $this->view->generate('items_view.php', 'template_view.php', array('items' => $items,'pagination' => $paginationData));//передаем View
    }
}
