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
    num VARCHAR(10),
    nom TEXT,
    id_Region INTEGER,
    FOREIGN KEY (id_Region) REFERENCES Regions(id))");

$dbh->sendRequest("CREATE TABLE IF NOT EXISTS Commune(
    id INTEGER AUTO_INCREMENT PRIMARY KEY, 
<<<<<<< HEAD
    CodePostal VARCHAR(10),
    CodeInsee VARCHAR(10),
=======
    CodePostal VARCHAR(100),
>>>>>>> 9deff647881015e5e827dae79d424102d4861796
    nom TEXT,
    id_Departement INTEGER,
    FOREIGN KEY (id_Departement) REFERENCES Departements(id))");

$dbh->sendRequest("CREATE TABLE IF NOT EXISTS Categorie(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nom TEXT)");

$dbh->sendRequest("CREATE TABLE IF NOT EXISTS Festival(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nom TEXT,
    url TEXT,
    numIdentif VARCHAR(100),
    DateCreation TEXT, # TODO Type Date
    Periodicite TEXT,
    Longitude VARCHAR(100),
    Latitude VARCHAR(100),
    id_Commune INTEGER,
    FOREIGN KEY (id_Commune) REFERENCES Commune(id))");

$dbh->sendRequest("CREATE TABLE IF NOT EXISTS LienCatFest(
    id_Categorie INTEGER,
    id_Festival INTEGER,
    FOREIGN KEY (id_Categorie) REFERENCES Categorie(id),
    FOREIGN KEY (id_Festival) REFERENCES Festival(id)
)");

$dbh->sendRequest("CREATE TABLE IF NOT EXISTS Edition(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    Annee INTEGER,
    DateDebut TEXT,  
    DateFin TEXT,  
    id_Festival INTEGER,
    FOREIGN KEY (id_Festival) REFERENCES Festival(id)
)");


/* $dbh->sendRequest("CREATE TABLE IF NOT EXISTS LienLocalFest(
    id_Localite INTEGER,
    id_Festival INTEGER,
    FOREIGN KEY (id_Localite) REFERENCES Localite(id),
    FOREIGN KEY (id_Festival) REFERENCES Festival(id)

)"); */

$dbh->sendRequest("CREATE TABLE IF NOT EXISTS Utilisateurs(
    id INTEGER AUTO_INCREMENT PRIMARY KEY, 
    pseudo TEXT NOT NULL,
    password TEXT NOT NULL
)");