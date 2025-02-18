<?php

require_once MODEL_DIR . 'ListModel.php';

class ListController {
    private $model;

    public function __contructor($dataBase) {
        $this->model = new ListModel($dataBase);
    }

    public function list() {
        $items = $this->model->getTodoList();

        foreach ($items as &$item) {
            $item_id = $item['item_id'];
            $item_img = URL_IMG . 'itens/{$item_id}.jpg';

            if (file_exists($item_img)) {
                $item['imagem'] = $item_img;
            } else {
                $item['imagem'] = URL_IMG . 'itens/default.png';
            }
        }

        require VIEW_DIR . 'List/todo_list.php';
    }
}

?>