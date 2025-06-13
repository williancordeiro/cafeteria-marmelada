CREATE DATABASE IF NOT EXISTS marmelada
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

CREATE USER IF NOT EXISTS 'worker'@'%' IDENTIFIED BY 'senha';

GRANT ALL PRIVILEGES ON marmelada.* TO 'worker'@'%';

FUSH PRIVILEGES;

USE marmelada;

CREATE TABLE IF NOT EXISTS users(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(32),
    user_email VARCHAR(32),
    user_password VARCHAR(64)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS itens(
    item_id INT PRIMARY KEY AUTO_INCREMENT,
    item_name VARCHAR(64),
    item_price DECIMAL(4, 2),
    item_qtd INT,
    item_avaliable TINYINT(1) DEFAULT 1
) ENGINE=InnoDB;