CREATE DATABASE IF NOT EXISTS wdpa;
USE wdpa;

CREATE TABLE iscrizioni (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  email VARCHAR(100),
  evento VARCHAR(100),
  data_iscrizione TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE utenti (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE,
  password_hash VARCHAR(255)
);

INSERT INTO utenti (username, password_hash)
VALUES ('admin', SHA2('admin123', 256));