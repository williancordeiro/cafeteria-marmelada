<?php
require_once 'config/geral.php';
require_once MODEL_DIR . 'UserModel.php';

use \Model\UserModel;

class LoginController {

    public function index() {
        include VIEW_DIR . 'Login/login.php';
    }

    public function login() {
        if (!isset($_POST['email']) || !isset($_POST['password'])) {
            $_SESSION['error'] = 'Preencha todos os campos!';
            $this->redirect('login');
            return;
        }

        $user = UserModel::getUserByEmail($_POST['email']);
        if ($user && $user->verifyPassword($_POST['password'])) {
            session_start();
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['name'] = $user->getName();
            $_SESSION['email'] = $user->getEmail();

            $this->redirect('index');
        } else {
            $_SESSION['error'] = 'Usuário ou senha Invalido';
            $this->redirect('login');
        }
    }

    private function redirect($url) {
        header("Location: " . URL_RAIZ . $url);
        exit();
    }
}
?>