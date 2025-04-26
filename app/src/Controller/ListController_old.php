<?php
require_once 'config/geral.php';
require_once MODEL_DIR . 'ListModel.php';

use \Model\ListModel;

class ListController {
    private $model;

    public function __construct($dataBase) {
        $this->model = new ListModel($dataBase);
    }

    public function getList() {
        $items = $this->model->getTodoList();

        foreach ($items as &$item) {
            $item_id = $item['item_id'];
            $item_img = "public/img/itens/{$item_id}.png";

            if (file_exists($item_img)) {
                $item['imagem'] = $item_img;
            } else {
                $item['imagem'] = URL_IMG . 'itens/default.png';
            }
        }
        unset($item);

        require VIEW_DIR . 'List/todo_list.php';
    }
}

?>