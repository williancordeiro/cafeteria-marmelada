<?php
namespace Model;

require_once 'config/data-base.php';
require_once DATABASE_DIR . 'DataBase.php';

// var_dump($dataBase);

use \PDO;
use \PDOException;
use DataBase\DataBase;

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
        $db = new DataBase();
        $db->startConnection();
        $this->db = $db->getConnection();
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
        return $this->insert();
    }

    private function insert() {
        try {
            $stmt = $this->db->prepare(self::INSERT_USER);
            $stmt->bindValue(1, $this->name);
            $stmt->bindValue(2, $this->email);
            $stmt->bindValue(3, $this->password);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            error_log("Usuário não Cadastrado: " . $e->getMessage());
            return false;
        }
    }

    public static function getUserByEmail($email) {
        try {
            $userModel = new self('', $email, '');
            $conn = $userModel->db;

            $command = $conn->prepare(self::SEARCH_EMAIL);
            $command->bindValue(1, $email, PDO::PARAM_STR);
            $command->execute();

            $register = $command->fetch(PDO::FETCH_ASSOC);
            if ($register) {
                $object = new self(
                    $register['name'],
                    $register['email'],
                    $register['password'],
                    $register['user_id']
                );
                return $object;
            }

            return true;
        } catch (PDOException $e) {
            error_log("Erro ao localizar usuário: " . $e->getMessage());
            return false;
        }
    }
}

?>