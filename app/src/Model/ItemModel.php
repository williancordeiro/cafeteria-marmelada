<?php
namespace Model;

require_once 'config/data-base.php';
require_once DATABASE_DIR . 'DataBase.php';

// var_dump($dataBase);

use \PDO;
use \PDOException;
use DataBase\DataBase;

class ItemModel {
    const SEARCH_ID = 'SELECT * FROM itens WHERE item_id = ? AND item_avaliable = 1';
    const SEARCH_NAME = 'SELECT * FROM itens WHERE item_name = ? AND item_avaliable = 1 LIMIT 1';
    const SEARCH_ALL = 'SELECT * FROM itens WHERE item_avaliable = 1 ORDER BY item_id ASC';
    const INSERT_ITEM = 'INSERT INTO itens(item_name, item_price, item_qtd) VALUES (?, ?, ?)';
    const UPDATE_ITEM = 'UPDATE itens SET item_name = ?, item_price = ?, item_qtd = ? WHERE item_id = ?';
    const DELETE_ITEM = 'UPDATE itens SET item_avaliable = 0 WHERE item_id = ?';

    private $id;
    private $name;
    private $price;
    private $qtd;

    private PDO $db;

    public function __construct($name, $price, $qtd, $id = null) {
        $this->name = $name;
        $this->price = $price;
        $this->qtd = $qtd;
        $this->id = $id;

        $this->connect();
    }

    private function connect() {
        $db = new DataBase();
        $db->startConnection();
        $this->db = $db->getConnection();
    }

    public function setName($name) {
        $this->name = $name;
    }
    
    public function setPrice($price) {
        $this->price = $price;
    }
    
    public function setQtd($qtd) {
        $this->qtd = $qtd;
    }    

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getQtd() {
        return $this->qtd;
    }

    public function save() {
        return $this->insert();
    }

    private function insert() {
        try {
            $stmt = $this->db->prepare(self::INSERT_ITEM);
            $stmt->bindValue(1, $this->name);
            $stmt->bindValue(2, $this->price);
            $stmt->bindValue(3, $this->qtd);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log("Item não Cadastrado: " . $e->getMessage());
            return false;
        }
    }

    public static function getAllItens() {
        $itemModel = new self('', '', '');
        $conn = $itemModel->db;

        $stmt = $conn->prepare(self::SEARCH_ALL);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $items = [];

        foreach ($results as $row) {
            $items[] = new self(
                $row['item_name'],
                $row['item_price'],
                $row['item_qtd'],
                $row['item_id']
            );
        }

        return $items;
    }

    public static function getItemById($id) {
        try {
            $itemModel = new self('', '', '', $id);
            $conn = $itemModel->db;

            $command = $conn->prepare(self::SEARCH_ID);
            $command->bindValue(1, $id, PDO::PARAM_STR);
            $command->execute();

            $object = false;
            $register = $command->fetch(PDO::FETCH_ASSOC);
            if ($register) {
                $object = new self(
                    $register['item_name'],
                    $register['item_price'],
                    $register['item_qtd'],
                    $register['item_id']
                );
            }
            return $object;
        } catch (PDOException $e) {
            error_log("Erro ao localizar item: " . $e->getMessage());
            return false;
        }
    }

    public function saveUpdate() {
        return $this->update();
    }

    private function update() {
        try {
            $stmt = $this->db->prepare(self::UPDATE_ITEM);
            $stmt->bindValue(1, $this->name);
            $stmt->bindValue(2, $this->price);
            $stmt->bindValue(3, $this->qtd);
            $stmt->bindValue(4, $this->id);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log("Item não Atualizado: " . $e->getMessage());
            return false;
        }
    }

    public function delete() {
        return $this->desactiveItem();
    }

    private function desactiveItem() {
        try {
            $stmt = $this->db->prepare(self::DELETE_ITEM);
            $stmt->bindValue(1, $this->id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log("Erro ao deletar item: " . $e->getMessage());
            return false;
        }
    }
 }