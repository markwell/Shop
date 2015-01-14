<?php
class Controller_User extends Controller
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
                header('Location:/shop/user/checkUser');
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
                setcookie("id", "", time() - 3600*24*30*12, "/");
                setcookie("hash", "", time() - 3600*24*30*12, "/");
                $message = "Авторизуйтесь пожалуйста.";
            } else {
                $message = "Привет, ".$userdata['user_login'].". Все отлично!";
            }
        } else {
                $message = "Пожалуйста, включите куки.";
        }
        $this->view->generate('login_view.php', 'template_view.php', $message);
    }
    function action_logoutUser()
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/");
    } 
    function action_getItemsAndShow()
    {
        $count_show_pages = 5; //число видимых элементов пагинации
        $url = "/shop/user/getitemsandshow?page=1"; //адрес первой страницы
        $url_page = "/shop/user/getitemsandshow?page="; //адрес страницы с параметром page без значения на конце. 
        @$active = $_GET['page']; //параметр активной страницы мы передаем функции с помощью глобального массива GET
        @$category = $_GET['category'];
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
        setcookie("item_id", $items[$paginationData['active']-1]['id'], time() + 60 * 60 * 24 * 30); //добавляем в куки ID товара(для добавления товара в корзину)
        $this->view->generate('items_view.php', 'template_view.php', array('items' => $items,'pagination' => $paginationData));//передаем View
    }
    function action_addItemToOrder()
    {
        if (isset($_POST['submit'])) {
        $userdata = $this->model->getHashAndID(intval($_COOKIE['id']));
        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
            if (($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])) {
                setcookie("id", "", time() - 3600*24*30*12, "/");
                setcookie("hash", "", time() - 3600*24*30*12, "/");
                $message = "Авторизуйтесь пожалуйста.";
                $this->view->generate('login_view.php', 'template_view.php', $message);
            } else {
                        $this->model->addItemToOrder($_COOKIE['id'],$_COOKIE['item_id']);
                        echo "Добавлено!";
                    }
            } else {
                        $message = "Пожалуйста, включите куки.";
                        $this->view->generate('login_view.php', 'template_view.php', $message);
                    }
        
        }
    }
    function action_getOrderItemsAndShow()
    {
        $userdata = $this->model->getHashAndID(intval($_COOKIE['id']));
        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
            if (($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])) {
                setcookie("id", "", time() - 3600*24*30*12, "/");
                setcookie("hash", "", time() - 3600*24*30*12, "/");
                $message = "Авторизуйтесь пожалуйста.";
                $this->view->generate('login_view.php', 'template_view.php', $message);
            } else {
                        $items = $this->model->getOrderItems($_COOKIE['id']);
                        $this->view->generate('orders_view.php', 'template_view.php', $items);
                    }
            } else {
                        $message = "Пожалуйста, включите куки.";
                        $this->view->generate('login_view.php', 'template_view.php', $message);
                    }
        
        }
    function action_deleteItemFromOrder()
    {
        if (isset($_POST['submit'])) {
                $userdata = $this->model->getHashAndID(intval($_COOKIE['id']));
                if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
                    if (($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])) {
                        setcookie("id", "", time() - 3600*24*30*12, "/");
                        setcookie("hash", "", time() - 3600*24*30*12, "/");
                        $message = "Авторизуйтесь пожалуйста.";
                        $this->view->generate('login_view.php', 'template_view.php', $message);
                    } else {
                                $this->model->deleteItemFromOrder($_COOKIE['id'], $_POST['deleteItem']);
                                echo "Удалено!";
                            }
                    } else {
                                $message = "Пожалуйста, включите куки.";
                                $this->view->generate('login_view.php', 'template_view.php', $message);
                            }
                
                }
    }   }
