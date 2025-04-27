<?php
require_once 'config/geral.php';
require_once MODEL_DIR . 'ItemModel.php';

use \Model\ItemModel;

class ItemController {
    
    public function index() {
        include VIEW_DIR . 'Product/product.php';
    }

    public function create() {
        session_start();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $price = trim($_POST['price']);
            $qtd = trim($_POST['qtd']);
        }

        if (empty($name) || empty($price) || empty($qtd)) {
            $_SESSION['error'] = "Campos obrigatórios";
            header('Location: ' . URL_RAIZ . 'product');
            exit();
        }

        $item = new ItemModel($name, $price, $qtd);

        if ($item->save()) {
            header('Location: ' . URL_RAIZ . 'home');
            exit();
        } else {
            $_SESSION['error'] = "Erro ao cadastrar item.";
            header('Location:' . URL_RAIZ . 'product');
            exit();
        }
    }
}