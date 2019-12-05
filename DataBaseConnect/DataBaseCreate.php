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
    CodePostal VARCHAR(20),
    nom TEXT,
    id_Departement INTEGER,
    FOREIGN KEY (id_Departement) REFERENCES Departements(id))");

/* $dbh->sendRequest("CREATE TABLE IF NOT EXISTS Localite(
    id INTEGER AUTO_INCREMENT PRIMARY KEY, 
    CodeINSEE INTEGER,
    nom TEXT,
    id_Commune INTEGER,
    FOREIGN KEY (id_Commune) REFERENCES Commune(id))"); */

/* $dbh->sendRequest("CREATE TABLE IF NOT EXISTS GPS(
    id INTEGER AUTO_INCREMENT PRIMARY KEY, 
    Longitude FLOAT,
    Latitude FLOAT,
    id_Localite INTEGER,
    FOREIGN KEY (id_Localite) REFERENCES Localite(id))"); */

$dbh->sendRequest("CREATE TABLE IF NOT EXISTS Categorie(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nom TEXT)");

$dbh->sendRequest("CREATE TABLE IF NOT EXISTS Festival(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nom TEXT,
    url TEXT,
    noIdentif INTEGER,
    DateCreation DATE, # TODO Type Date
    Periodicite TEXT,
    Longitude FLOAT,
    Latitude FLOAT,
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
    No INTEGER,
    DateDebut DATE, # TODO Type Date
    DateFin DATE, # TODO Type Date
    id_Festival INTEGER,
    id_GPS INTEGER,
    FOREIGN KEY (id_GPS) REFERENCES GPS(id),
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