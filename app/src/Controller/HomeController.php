<?php
require_once 'config/geral.php';
require_once MODEL_DIR . 'UserModel.php';
require_once MODEL_DIR . 'ItemModel.php';

use \Model\UserModel;
use \Model\ItemModel;

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

        $this->getProducts();

        if (!$user) {
            header("Location: " . URL_RAIZ . 'login');
            exit();
        }

        include VIEW_DIR . 'Home/home.php';
    }

    public function getProducts() {
        $items = $this->model->getAllItens();
        $item_img = "public/img/itens/{$item->getId()}.png";
        $products = [];

        foreach($items as $item) {
            $products[] = [
                'id' => (int) $item->getId(),
                'nome' => htmlspecialchars($item->getName()),
                'preco' => number_format($item->getPrice(), 2, ',', '.'),
                'qtd' => (int) $item->getQtd(),
                'imagem' => $item->getImagePath()
            ];
        }

        return $products;
    }
}
?>