CREATE DATABASE feedback;

use feedback;

CREATE TABLE `cliente` (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(250) NOT NULL,
    email VARCHAR(200) NOT NULL
  );

CREATE TABLE `chamado` (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    texto MEDIUMTEXT NOT NULL,
    nota INT NOT NULL DEFAULT -1,
    cliente INT NOT NULL,
    FOREIGN KEY (cliente) REFERENCES cliente(id)
  );


INSERT INTO `cliente` (`id`, `nome`, `email`) VALUES (NULL, 'Lucas Buzzo', 'lucas.buzzo@dcomp.sor.ufscar.br');

INSERT INTO `chamado` (`id`, `texto`, `cliente`) VALUES (NULL, 'Apenas mais um teste, para prova de conceito', '1');
