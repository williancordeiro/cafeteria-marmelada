<?php
require_once 'config/geral.php';
require_once MODEL_DIR . 'ItemModel.php';

use \Model\ItemModel;

class ItemController {

    // public function __construct($dataBase) {
    //     $this->model = new ItemModel($dataBase);
    // }
    
    public function index() {
        $items = $this->getProducts();
        include VIEW_DIR . 'Product/product.php';
    }

    public function create() {
        include VIEW_DIR . 'Product/create.php';
    }

    public function getProducts() {
        $items = ItemModel::getAllItens();
        $products = [];

        foreach($items as $item) {
            $products[] = [
                'id' => (int) $item->getId(),
                'nome' => htmlspecialchars($item->getName()),
                'preco' => (float) $item->getPrice(),
                'qtd' => (int) $item->getQtd(),
            ];
        }

        return $products;
    }

    public function register() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $price = trim($_POST['price']);
            $qtd = trim($_POST['qtd']);
        }

        if (empty($name) || empty($price) || empty($qtd)) {
            $_SESSION['error'] = "Campos obrigatórios";
            header('Location: ' . URL_RAIZ . 'products/create');
            exit();
        }

        $item = new ItemModel($name, $price, $qtd);

        if ($item->save()) {
            header('Location: ' . URL_RAIZ . 'products');
            exit();
        } else {
            $_SESSION['error'] = "Erro ao cadastrar produto.";
            header('Location: ' . URL_RAIZ . 'products/create');
            exit();
        }
    }

    public function edit() {
        $id = (int) $_GET['id'];
        $item = ItemModel::getItemById($id);

        if (!$item) {
            $_SESSION['error'] = "Item não encontrado.";
            header('Location: ' . URL_RAIZ . 'products');
            exit();
        }

        include VIEW_DIR . 'Product/edit.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . URL_RAIZ . 'products');
            exit();
        }
    
        $id = (int) $_GET['id'];
        $name = trim($_POST['name']);
        $price = trim($_POST['price']);
        $qtd = trim($_POST['qtd']);
    
        if (empty($name) || empty($price) || empty($qtd)) {
            $_SESSION['error'] = "Todos os campos são obrigatórios.";
            header('Location: ' . URL_RAIZ . 'products/edit?id=' . $id);
            exit();
        }
    
        $item = ItemModel::getItemById($id);
    
        if (!$item) {
            $_SESSION['error'] = "Item não encontrado.";
            header('Location: ' . URL_RAIZ . 'products');
            exit();
        }
    
        $item->setName($name);
        $item->setPrice($price);
        $item->setQtd($qtd);
    
        if ($item->saveUpdate()) {
            header('Location: ' . URL_RAIZ . 'products');
            exit();
        } else {
            $_SESSION['error'] = "Erro ao atualizar o produto.";
            header('Location: ' . URL_RAIZ . 'products/edit?id=' . $id);
            exit();
        }
    }
    
}