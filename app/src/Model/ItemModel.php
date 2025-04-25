<?php
namespace Model;

require_once 'config/data-base.php';
require_once DATABASE_DIR . 'DataBase.php';

// var_dump($dataBase);

use \PDO;
use \PDOException;
use DataBase\DataBase;

class ItemModel {
    const SEARCH_ID = 'SELECT * FROM itens WHERE item_id = ?';
    
}