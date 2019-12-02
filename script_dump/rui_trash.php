<?php

/* //var_dump($_POST);


$DB_USER='CQCB';
$DB_PASSWORD='CQCB';
$DB_HOST= 'localhost';
$DB_NAME='festoche-fastoche';


$conn = new PDO("mysql:host=".$DB_HOST.";dbname=".$DB_NAME,$DB_USER,$DB_PASSWORD);

include("../function/chargecol.php"); */

/* $coordenatescol = saveColData($excel_array,0,14);

$coordline = linear($coordenatescol,0,14); */

//$coord = explode(',',$coordline[54]);

/* $codeinsee= saveColData($excel_array,0,13);

$codeinseeLine = linear($codeinsee,0,13);


$comPrinc = saveColData($excel_array,0,7);

$comPrincLine = linear($comPrinc,0,7);

$size = sizeof($comPrincLine);



//var_dump($codeinseeLine);

for($i=0;$i<$size;$i++) {

     try {
        $data = "INSERT INTO localite (CodeINSEE, nom)
        VALUES ('$codeinseeLine[$i]','$comPrincLine[$i]')";
        $conn->prepare($data)->execute();
        echo 'data INSERTED';
    }catch (PDOException $e) {
        echo 'ERROR IN INSERT : ' . $e->getMessage();
    } 

} */

?>

<!-- <form action="" method="post">
    Nom de Ville: <input type="text" name="nom">
        <input  type="button" value="Search" id="but2">

</form> -->