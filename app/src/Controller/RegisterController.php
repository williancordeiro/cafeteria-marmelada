<?php
require_once 'config/geral.php';
require_once MODEL_DIR . 'UserModel.php';

use \Model\UserModel;

class RegisterController {

    public function index() {
        include VIEW_DIR . 'Register/register.php';
    }

    public function register() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
        }

        if (empty($name) || empty($email) || empty($password)) {
            echo "Campos obrigatórios";
            return;
        }

        $user = new UserModel($name, $email, $password);

        if ($user->save()) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário.";
        }
    }
}
?>