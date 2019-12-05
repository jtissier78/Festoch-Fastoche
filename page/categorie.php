<?php

/* require "DataBaseConnect/Classes/Connexion.php";

//innitiates connexion to server
$new_pdo = new Connexion();

$conn= $new_pdo->PDOInit(); */


//select info from regions
$stmt = $conn->prepare("SELECT * FROM categorie");
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach($stmt->fetchAll() as $k=>$v) {
        $categorie[$k] =$v['nom'];
        $cat_id[$k] = $v['id'];
}

//var_dump($categorie);



?>

<div class="row">
        <div class="col-lg-6 mx-auto">
            <button id="but4" type="button" class="btn btn-primary">Categorie </button>
            <!-- Multiselect dropdown -->
            <select multiple data-style="bg-white rounded-pill px-4 py-3 shadow-sm " class="selectpicker w-20" id="picker2">
            <?php   
                foreach($categorie as $k=>$cat){
                    echo "<option value='$cat_id[$k]'>$cat</option>";
                }
            
            ?>

            </select><!-- End -->
        </div>
        
    </div>