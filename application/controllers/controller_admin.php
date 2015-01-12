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
        $count_show_pages = 5; //число видимых элементов пагинации
        
        $url = "/shop/admin/getitemsandshow?page=1"; //адрес первой страницы
        $url_page = "/shop/admin/getitemsandshow?page="; //адрес страницы с параметром page без значения на конце. 
        $active = $_GET['page']; //параметр активной страницы мы передаем функции с помощью глобального массива GET
        $category = $_GET['category'];
        if (empty($active)) //если нет параметра page то ставим значение активное элемента = 1
        {
          $active = 1;
        }
        if (!empty($category)) //если в url есть параметр 'category', то оставляем элементы только с указанной категорией
        {
          $items = $this->model->getCategoryItems($category); //вытаскиваем все элементы указанной категории
        } else {
          $items = $this->model->getItems(); //вытаскиваем все строки из бд
        }
        $count_pages = count($items); //подсчитываем кол-во этих строк
        if ($count_pages > 1) 
        { 
              $left = $active - 1;
              $right = $count_pages - $active;
              if ($left < floor($count_show_pages / 2)) $start = 1;
              else $start = $active - floor($count_show_pages / 2);
              $end = $start + $count_show_pages - 1;
              if ($end > $count_pages) 
              {
              $start -= ($end - $count_pages);
              $end = $count_pages;
              if ($start < 1) $start = 1;
            }
        }
        $paginationData = array('count_pages' => $count_pages, 'active' => $active, 'url' => $url, 'url_page' => $url_page, 'start' => $start, 'end' => $end, 'category' => $category); //создаем массив для View
        $this->view->generate('items_view.php', 'template_view.php', array('items' => $items,'pagination' => $paginationData));//передаем View
    }
    
}
