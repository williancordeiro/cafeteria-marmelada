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

        try {
            if($_SERVER['REQUEST_METHOD'] === 'POST')
                throw new Exception("Metodo de requisição invalido", 1);

            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (empty($name) || empty($email) || empty($password))
                throw new Exception("Preencha todos os campos");

            $user = new UserModel($name, $email, $password);
            
            if (!$user->save())
                throw new Exception("Não foi possível completar o cadastro.");

            $_SESSION['success'] = "Cadastro Realizado com Sucesso!";
            header('Location: ' . URL_RAIZ . 'login');
            exit();
                
        } catch (\Throwable $e) {
            error_log("ERRO AO CADASTRAR USUÁRIO: " . $e.getMessage());

            $_SESSION['error'] = "Erro ao cadastrar usuario";
            header('Location: ' . URL_RAIZ . 'register');
            exit();
        }

        /*if (empty($name) || empty($email) || empty($password)) {
            // echo "Campos Obrigatórios";
            $_SESSION['error'] = "Campos obrigatórios";
            
        }*/

        

        /*if ($user->save()) {
            // echo "Usuário cadastrado com sucesso! Redirecionando...";
            header('Location: ' . URL_RAIZ . 'login');
            exit();
        } else {
            // echo "Erro ao salvar usuário no banco de dados.";
            $_SESSION['error'] = "Erro ao cadastrar usuário.";
            header('Location: ' . URL_RAIZ . 'register');
            exit();
        }*/
    }
}
?>