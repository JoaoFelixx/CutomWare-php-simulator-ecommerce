# nome do banco
CREATE DATABASE projeto_login;
USE projeto_login;

#tabelas do banco
CREATE TABLE costumiza(
    PersonID INT AUTO_INCREMENT,
    id_user INT NOT NULL, 
    nomeCust VARCHAR(40) NOT NULL,
    valorCust VARCHAR(6) NOT NULL,
    PRIMARY KEY (PersonID));


CREATE TABLE conserto(
    ConserID INT AUTO_INCREMENT,
    id_user INT NOT NULL,
    modelPerif VARCHAR(40) NOT NULL,
    problePerif VARCHAR(50) NOT NULL,
    valorCons VARCHAR(6) NOT NULL,
    PRIMARY KEY (ConserID));


CREATE TABLE usuarios(
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    dinheiro VARCHAR(8) NOT NULL,
    refID INT,
    FOREIGN KEY (refID) REFERENCES costumiza(PersonID),
    FOREIGN KEY (refID) REFERENCES conserto(ConserID));


create table contato(
    id INT PRIMARY KEY AUTO_INCREMENT,
    assunto VARCHAR(50) NOT NULL,
    nome VARCHAR(50) NOT NULL,
    comentario VARCHAR(255) NOT NULL);