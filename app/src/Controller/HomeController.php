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

        /*if (!isset($_SESSION['user_id'])) {
            header("Location: " . URL_RAIZ . 'login');
            exit();
        }

        $user = UserModel::getUserById($_SESSION['user_id']);

        $items = $this->getProducts();

        if (!$user) {
            header("Location: " . URL_RAIZ . 'login');
            exit();
        }*/

        include VIEW_DIR . 'Home/home.php';
    }

    private function getImagePath(int $id): string {
        $filePath = PUBLIC_DIR . "img/itens/{$id}.png";
        $urlPath = file_exists($filePath)
            ? URL_IMG . "itens/{$id}.png"
            : URL_IMG . "itens/default.png";
    
        return $urlPath;
    }    

    public function getProducts() {
        $items = ItemModel::getAllItens();
        //$item_img = "public/img/itens/{$item->getId()}.png";
        $products = [];

        foreach($items as $item) {
            $id = (int) $item->getId();
            $products[] = [
                'id' => $id,
                'nome' => htmlspecialchars($item->getName()),
                'preco' => (float) $item->getPrice(),
                'qtd' => (int) $item->getQtd(),
                'imagem' => $this->getImagePath($id)
            ];
        }

        return $products;
    }
}
?>