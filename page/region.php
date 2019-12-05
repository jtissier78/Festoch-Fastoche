<?php  

require "DataBaseConnect/Classes/Connexion.php";

//innitiates connexion to server
$new_pdo = new Connexion();

$conn= $new_pdo->PDOInit();

//select info from regions
$stmt = $conn->prepare("SELECT * FROM regions");
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach($stmt->fetchAll() as $k=>$v) {
        $region[$k] =$v['nom'];
        $id_region[$k] = $v['id'];
}

//select info from departments
$stmt = $conn->prepare("SELECT * FROM departements");
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach($stmt->fetchAll() as $k=>$v) {
        $dep_nom[$k] =$v['nom'];
        $id_dep_reg[$k] = $v['id_Region'];
        $id_dep[$k] = $v['id'];
}


//select info from commune
$stmt = $conn->prepare("SELECT * FROM commune");
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach($stmt->fetchAll() as $k=>$v) {
        $com_nom[$k] =$v['nom'];
        $id_dep_dep[$k] = $v['id_Departement'];
        $id_ville[$k] = $v['id'];
} 




//var_dump($com_nom);

?>


<?php //lodal isual content display

      echo  "<ul class='dropdown-menu multi-level' role='menu' aria-labelledby='dropdownMenu'>";
      
      foreach ($region as $k=>$v){
      /* if($k>5) //first five entrys are empty
      { */
      echo  "<li class='dropdown-submenu style:'height:-20px;'>";
        
      echo  "<a class='dropdown-item' tabindex='-1' href='#'>$v</a><br>";
      echo  "<ul class='dropdown-menu'>";


      echo "<li class='dropdown-item' role='menu' aria-labelledby='dropdownMenu'><a tabindex='-1'>Departements</a></li>";

             foreach($dep_nom as $y=> $n)
             {
                if($id_region[$k]==$id_dep_reg[$y]){ 

               
                  echo "<li class='dropdown-submenu'>";
                  echo "<a class='dropdown-item' href='#'>$n</a>";
                  echo  "<ul class='dropdown-menu'>";
                 // echo    "<li class='dropdown-item'>Ville</li>";

            
                            echo  "<label class='text-white mb-3 lead'>La Ville?</label>";
                  //Multiselect dropdown 

                            echo  "<select multiple data-style='bg-white rounded-pill px-4 py-3 shadow-sm ' class='selectpicker w-18'>";
                                  foreach($com_nom as $z=> $nom){
                                    
                                      if($id_dep[$y]==$id_dep_dep[$z]){
                                        echo      "<option value='$id_ville[$z]'>$nom</option>";

                                      }
                                      
                                  }
                                  echo  "</select>";
 
                                 // End
                  echo "</ul>";
                  echo "</li>";
                  

               }
             }

      echo "</li>";
             
      /* echo  "</ul>"; */
      echo "</li>"; 
      echo "</ul>";
      echo "</li>";

      }
    //}
      echo "</ul>";
    
?>

<!--   <a  class="dropdown-item" tabindex="-1" href="#">Hover me for more options</a>
  <ul class="dropdown-menu"> -->
