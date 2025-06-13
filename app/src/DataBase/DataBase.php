<?php
namespace DataBase;

require_once 'config/data-base.php';

use \PDO;
use \PDOException;

class DataBase {

    private $db;
    private $dsn;
    private $user;
    private $password;
    private $options;

    private $config = [
        'driver' => 'mysql',
        'server' => '',
        'port' => '3306',
        'base' => 'marmelada',
        'user' => 'user',
        'password' => 'password',
    ];

    public function __construct() {
       $this->dsn = "{$this->config['driver']}:host={$this->config['server']};port={$this->config['port']};dbname={$this->config['base']}";
       $this->user = $this->config['user'];
       $this->password = $this->config['password'];
       $this->options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
       ];
    }

    public function startConnection() {
        try {
            if ($this->db === null)
                $this->db = new PDO($this->dsn, $this->user, $this->password, $this->options);
        } catch (PDOException $e) {
            die("Erro ao conectar com o banco de dados: " . $e->getMessage());
        }
    }

    public function getConnection() {
        if ($this->db === null)
            $this->startConnection();

        return $this->db;
    }   

}
?>