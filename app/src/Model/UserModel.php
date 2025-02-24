<?php

require_once 'config/geral.php';
require_once 'config/data-base.php';

use \PDO;

class UserModel {
    
    const INSERT_USER = 'INSERT INTO users(email, password, name) VALUES (?, ?, ?)';

    private $name;
    private $email;
    private $password;
    private $passwordHash;

    public function __construct($email, $passwordHash, $name) {
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        if ($passwordHash != null)
            $this->password = password_hash($passwordHash, PASSWORD_BCRYPT);
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }

    public function verifyPass($passwordHash) {
        return password_verify($passwordHash, $this->password);
    }

    private function insert() {
        $dsn = "{$dataBase['driver']}:host={$dataBase['server']};port={$dataBase['port']};dbname={$dataBase['base']}";
        $pdo = new PDO($dsn, $dataBase['user'], $dataBase['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare(self::INSERT_USER);
        $stmt->bindParam('email', $this->email);
        $stmt->bindParam('password', $this->passwordHash);
        $stmt->bindParam('name', $this->name);
    }
}

?>