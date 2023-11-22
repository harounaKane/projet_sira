CREATE DATABASE 23_24_b2_PROJET_SIRA;

USE 23_24_b2_PROJET_SIRA;

CREATE TABLE membre(
     id_membre INT PRIMARY KEY AUTO_INCREMENT,
     prenom VARCHAR(20) NOT NULL,
     nom VARCHAR(20) NOT NULL,
     `login` VARCHAR(8) UNIQUE,
     mdp VARCHAR(100) NOT NULL,
     tel VARCHAR(15),
     email VARCHAR(20) UNIQUE,
     adresse VARCHAR(30),
     cp INT(5),
     ville VARCHAR(15),
     statut ENUM('CLIENT', 'ADMIN'),
     date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB;

CREATE TABLE agence(
     id_agence INT PRIMARY KEY AUTO_INCREMENT,
     nom VARCHAR(20),
     tel VARCHAR(15),
     email VARCHAR(20) UNIQUE,
     adresse VARCHAR(30),
     cp INT(5),
     ville VARCHAR(15),
     image VARCHAR(20)
)ENGINE=InnoDB;

CREATE TABLE vehicule(
     id_vehicule INT PRIMARY KEY AUTO_INCREMENT,
     marque VARCHAR(20) NOT NULL,
     modele VARCHAR(20),
     prix_journalier float(5,2),
     description TEXT,
     image VARCHAR(20),
     agence INT(10),
     FOREIGN KEY (agence) REFERENCES agence(id_agence)
)ENGINE=InnoDB;

CREATE TABLE location(
     id_location INT PRIMARY KEY AUTO_INCREMENT,
     id_client INT(10),
     id_vehicule INT(10),
     id_agence INT(10),
     dateDebut DATE,
     dateFin DATE,
     total FLOAT (10,2),
     dateReservation DATETIME DEFAULT CURRENT_TIMESTAMP,
     FOREIGN KEY (id_client) REFERENCES membre(id_membre),
     FOREIGN key (id_vehicule) REFERENCES vehicule(id_vehicule),
     FOREIGN key (id_agence) REFERENCES agence(id_agence)
)ENGINE=InnoDB;
