<?php
require_once 'config/geral.php';

use \Model\UserModel;

class LoginController {

    public function index() {
        include VIEW_DIR . 'Login/login.php';
    }
}
?>