<?php
require_once "Classes/Connexion.php";

$dbh=new Connexion();
$dbh->DBCreate();

$dbh->sendRequest("CREATE TABLE IF NOT EXISTS Regions(
    id INTEGER AUTO_INCREMENT PRIMARY KEY, 
    num INTEGER,
    nom TEXT)");

$dbh->sendRequest("CREATE TABLE IF NOT EXISTS Departements(
    id INTEGER AUTO_INCREMENT PRIMARY KEY, 
    num INTEGER,
    nom TEXT,
    id_Departement INTEGER,
    FOREIGN KEY (id_Departement) REFERENCES Regions(id))");

$dbh->sendRequest("CREATE TABLE IF NOT EXISTS Commune(
    id INTEGER AUTO_INCREMENT PRIMARY KEY, 
<<<<<<< HEAD
    CodePostal VARCHAR(20),
=======
    CodePostal INTEGER,
>>>>>>> dev
    nom TEXT,
    id_Departement INTEGER,
    FOREIGN KEY (id_Departement) REFERENCES Departements(id))");

<<<<<<< HEAD
/* $dbh->sendRequest("CREATE TABLE IF NOT EXISTS Localite(
=======
$dbh->sendRequest("CREATE TABLE IF NOT EXISTS Localite(
>>>>>>> dev
    id INTEGER AUTO_INCREMENT PRIMARY KEY, 
    CodeINSEE INTEGER,
    nom TEXT,
    id_Commune INTEGER,
<<<<<<< HEAD
    FOREIGN KEY (id_Commune) REFERENCES Commune(id))"); */

/* $dbh->sendRequest("CREATE TABLE IF NOT EXISTS GPS(
=======
    FOREIGN KEY (id_Commune) REFERENCES Commune(id))");

$dbh->sendRequest("CREATE TABLE IF NOT EXISTS GPS(
>>>>>>> dev
    id INTEGER AUTO_INCREMENT PRIMARY KEY, 
    Longitude FLOAT,
    Latitude FLOAT,
    id_Localite INTEGER,
<<<<<<< HEAD
    FOREIGN KEY (id_Localite) REFERENCES Localite(id))"); */
=======
    FOREIGN KEY (id_Localite) REFERENCES Localite(id))");
>>>>>>> dev

$dbh->sendRequest("CREATE TABLE IF NOT EXISTS Categorie(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nom TEXT)");

$dbh->sendRequest("CREATE TABLE IF NOT EXISTS Festival(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nom TEXT,
    url TEXT,
    noIdentif INTEGER,
<<<<<<< HEAD
    DateCreation TEXT, # TODO Type Date
    Periodicite TEXT,
    Longitude FLOAT,
    Latitude FLOAT,
    id_Commune INTEGER,
    FOREIGN KEY (id_Commune) REFERENCES Commune(id))");
=======
    DateCreation DATE,
    Periodicite TEXT)");
>>>>>>> dev

$dbh->sendRequest("CREATE TABLE IF NOT EXISTS LienCatFest(
    id_Categorie INTEGER,
    id_Festival INTEGER,
    FOREIGN KEY (id_Categorie) REFERENCES Categorie(id),
    FOREIGN KEY (id_Festival) REFERENCES Festival(id)
)");

$dbh->sendRequest("CREATE TABLE IF NOT EXISTS Edition(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    No INTEGER,
<<<<<<< HEAD
    DateDebut TEXT, # TODO Type Date
    DateFin TEXT, # TODO Type Date
=======
    DateDebut DATE,
    DateFin DATE,
>>>>>>> dev
    id_Festival INTEGER,
    id_GPS INTEGER,
    FOREIGN KEY (id_GPS) REFERENCES GPS(id),
    FOREIGN KEY (id_Festival) REFERENCES Festival(id)
)");

<<<<<<< HEAD
/* $dbh->sendRequest("CREATE TABLE IF NOT EXISTS LienLocalFest(
=======
$dbh->sendRequest("CREATE TABLE IF NOT EXISTS LienLocalFest(
>>>>>>> dev
    id_Localite INTEGER,
    id_Festival INTEGER,
    FOREIGN KEY (id_Localite) REFERENCES Localite(id),
    FOREIGN KEY (id_Festival) REFERENCES Festival(id)
<<<<<<< HEAD
)"); */
=======
)");
>>>>>>> dev

$dbh->sendRequest("CREATE TABLE IF NOT EXISTS Utilisateurs(
    id INTEGER AUTO_INCREMENT PRIMARY KEY, 
    pseudo TEXT NOT NULL,
    password TEXT NOT NULL
)");