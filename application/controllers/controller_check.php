<?
class Controller_check extends Controller
{
    function action_checkUser()
    {
        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
            if (($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])) {
                setcookie("id", "", time() - 3600 * 24 * 30 * 12, "/");
                setcookie("hash", "", time() - 3600 * 24 * 30 * 12, "/");
                // print "Some error!";
            } else {
                // print "Hello, ".$userdata['user_login'].". All good!";
            }
        } else {
            // print "Please, cookie on!";
        }
    }
}
?>