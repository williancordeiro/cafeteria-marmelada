<?php
require_once 'config/data-base.php';

class ListModel {
    private $db;

    public function __construct($dataBase) {
        $dsn = "{$dataBase['driver']}:host={$dataBase['server']};port={$dataBase['port']};dbname={$dataBase['base']}";
        $option = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->db = new PDO($dsn, $dataBase['user'], $dataBase['password'], $option);
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }

    public function getTodoList() {
        $stmt = $this->db->query("SELECT item_id, content FROM todo_list ORDER BY item_id ASC");
        return $stmt->fetchAll();
    }
}

?>