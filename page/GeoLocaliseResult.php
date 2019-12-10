<?php
session_start();

foreach ($_SESSION['result'] as $result) {?>
    <div id="resul">
    <?php
    $result['id'];echo"<br>";
    echo $result['nom'];echo"<br>";
    echo $result['url'];echo"<br>";
    echo $result['numIdentif'];echo"<br>";
    echo $result['DateCreation'];echo"<br>";
    if (!empty($result['Periodicite'])) {
        echo $result['Periodicite'];echo"<br>";
    }
    if (!empty($result['Longitude'])) {
        echo $result['Longitude'];echo"<br>";
    }
    if (!empty($result['Latitude'])) {
        echo $result['Latitude'];echo"<br>";
    }
    if (!empty($result['id_Commune'])) {
        echo $result['id_Commune'];echo"<br>";
    }

    echo $result['Annee'];echo"<br>";
    echo "date de debut :"$result['DateDebut'];echo"<br>";
    echo "date de fin :"$result['DateFin'];echo"<br>";

    ?></div>
    <?php
}


