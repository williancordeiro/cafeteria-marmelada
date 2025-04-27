<?php
require_once 'config/geral.php';
require_once MODEL_DIR . 'UserModel.php';

use \Model\UserModel;

class HomeController {

    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header("Location: " . URL_RAIZ . 'login');
            exit();
        }

        $user = UserModel::getUserById($_SESSION['user_id']);

        if (!$user) {
            header("Location: " . URL_RAIZ . 'login');
            exit();
        }

        include VIEW_DIR . 'Home/home.php';
    }
}
?>