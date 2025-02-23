<?php
require_once 'config/geral.php';

use \Model\UserModel;

class RegisterController {

    public function register() {
        $user = new User($_POST['email'], $_POST['password']);
        
    }
}
?>