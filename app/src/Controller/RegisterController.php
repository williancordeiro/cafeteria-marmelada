<?php
require_once 'config/geral.php';
require_once MODEL_DIR . 'UserModel.php';

use \Model\UserModel;

class RegisterController {

    public function index() {
        include VIEW_DIR . 'Register/register.php';
    }

    public function register() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }


        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
        }

        if (empty($name) || empty($email) || empty($password)) {
            // echo "Campos Obrigatórios";
            $_SESSION['error'] = "Campos obrigatórios";
            header('Location: ' . URL_RAIZ . 'register');
            exit();
        }

        $user = new UserModel($name, $email, $password);

        if ($user->save()) {
            // echo "Usuário cadastrado com sucesso! Redirecionando...";
            header('Location: ' . URL_RAIZ . 'login');
            exit();
        } else {
            // echo "Erro ao salvar usuário no banco de dados.";
            $_SESSION['error'] = "Erro ao cadastrar usuário.";
            header('Location: ' . URL_RAIZ . 'register');
            exit();
        }
    }
}
?>