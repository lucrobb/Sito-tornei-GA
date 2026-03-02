CREATE DATABASE tornei;
USE tornei;

CREATE TABLE iscrizioni (
    id INT AUTO_INCREMENT PRIMARY KEY,
    torneo VARCHAR(50),
    identity VARCHAR(10),
    nome VARCHAR(50),
    cognome VARCHAR(50),
    genere VARCHAR(10),
    classe VARCHAR(20),
    telefono VARCHAR(20),
    email VARCHAR(100)
);