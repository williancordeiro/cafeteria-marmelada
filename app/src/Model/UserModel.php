<?php
namespace Model;

require_once 'config/data-base.php';
require_once 'config/geral.php';

var_dump($dataBase);

use \PDO;
use \PDOException;

class UserModel {
    
    const SEARCH_ID = 'SELECT * FROM users WHERE user_id = ?';
    const SEARCH_EMAIL = 'SELECT * FROM users WHERE email = ? LIMIT 1';
    const INSERT_USER = 'INSERT INTO users(name, email, password) VALUES (?, ?, ?)';
    
    private $id;
    private $name;
    private $email;
    private $password;
    private $passwordHash;
    private $db;

    public function __construct($name, $email, $passwordHash, $id = null) {
        $this->name = $name;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        if ($passwordHash != null)
            $this->password = password_hash($passwordHash, PASSWORD_BCRYPT);

        $this->id = $id;
        $this->connect();
    }

    private function connect() {
        global $dataBase;

        $dsn = "{$dataBase['driver']}:host={$dataBase['server']};port={$dataBase['port']};dbname={$dataBase['base']}";
        $option = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->db = new PDO($dsn, $dataBase['user'], $dataBase['password'], $option);
        } catch (PDOException $e) {
            die("Erro ao conectar com o banco de dados: " . $e->getMessage());
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }

    public function verifyPassword($passwordHash) {
        return password_verify($passwordHash, $this->password);
    }

    public function save() {
        $this->insert();
    }

    private function insert() {
        try {
            $stmt = $this->db->query("SELECT MAX(user_id) AS last_id FROM users");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $nextId = $result['last_id'] ? $result['last_id'] + 1 : 1;

            $stmt = $this->db->prepare(self::INSERT_USER);
            $stmt->bindParam(':email', $this->name);
            $stmt->bindParam(':password', $this->email);
            $stmt->bindParam(':name', $this->password);

            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Usuário não Cadastrado: " . $e->getMessage());
            return false;
        }
    }
}

?>