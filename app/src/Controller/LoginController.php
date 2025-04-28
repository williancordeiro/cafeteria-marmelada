<?php
require_once 'config/geral.php';
require_once MODEL_DIR . 'UserModel.php';

use \Model\UserModel;

class LoginController {

    public function index() {
        include VIEW_DIR . 'Login/login.php';
    }

    public function login() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_POST['email']) || empty($_POST['password'])) {
            $_SESSION['error'] = 'Preencha todos os campos!';
            $this->redirect('login');
            return;
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = UserModel::getUserByEmail($_POST['email']);

        if (!$user) {
            $_SESSION['error'] = 'Usuário não encontrado.';
            $this->redirect('login');
            return;
        }

        if (!$user->verifyPassword($password)) {
            $_SESSION['error'] = 'Senha incorreta.';
            $this->redirect('login');
            return;
        }

        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_name'] = $user->getName();
        $_SESSION['user_email'] = $user->getEmail();

        $this->redirect('home');
    }

    private function redirect($url) {
        header("Location: " . URL_RAIZ . $url);
        exit();
    }
}
?>