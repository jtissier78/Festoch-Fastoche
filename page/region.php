<?php  

require "DataBaseConnect/Classes/Connexion.php";


$new_pdo = new Connexion();

$conn= $new_pdo->PDOInit();


$stmt = $conn->prepare("SELECT * FROM regions");
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach($stmt->fetchAll() as $k=>$v) {
        $region[$k] =$v['nom'];
        $id_region[$k] = $v['id'];
}


$stmt = $conn->prepare("SELECT * FROM departements");
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach($stmt->fetchAll() as $k=>$v) {
        $dep_nom[$k] =$v['nom'];
        $id_dep_reg[$k] = $v['id_Region'];
        $id_dep[$k] = $v['id'];
}



 $stmt = $conn->prepare("SELECT * FROM commune");
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach($stmt->fetchAll() as $k=>$v) {
        $com_nom[$k] =$v['nom'];
        $id_dep_dep[$k] = $v['id_Departement'];
} 




//var_dump($com_nom);

?>

<!-- <li class="dropdown-submenu"> -->
<?php
      echo  "<ul class='dropdown-menu multi-level' role='menu' aria-labelledby='dropdownMenu'>";
      
      foreach ($region as $k=>$v){

      echo  "<li class='dropdown-submenu style:'height:-20px;'>";
        
      echo  "<a  class='dropdown-item' tabindex='-1' href='#'>$v</a><br>";
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
                                        echo      "<option value=$id_dep_dep[$z]>$nom</option>";

                                      }
                                      
                                  }
                                  echo  "</select>";
 
                                 // End

                          
                  echo "</ul>";
                  echo "</li>";
                  

               }
             }




      echo "</li>";
             
      
/*       echo      "<li class='dropdown-submenu'><a class='dropdown-item' href='#'>another level</a>";
        echo        "<ul class='dropdown-menu'>";
      echo            "<li class='dropdown-item'><a href='#'>4th level</a></li>";
      echo            "<li class='dropdown-item'><a href='#'>4th level</a></li>";
      echo            "<li class='dropdown-item'><a href='#'>4th level</a></li>";
        echo        "</ul>";
       echo      "</li>"; */
      
      /* echo  "</ul>"; */
      echo "</li>"; 
      echo "</ul>";
      echo "</li>";

      }
      echo "</ul>";






/*       foreach($com_nom as $z=> $c){
        if($id_dep[$k]==$id_dep_dep[$k]){
        echo  "<label class='text-white mb-3 lead'>Where do you live?</label>";
          //Multiselect dropdown 
        echo  "<select multiple data-style='bg-white rounded-pill px-4 py-3 shadow-sm ' class='selectpicker w-100'>";
        echo      "<option>United Kingdom</option>";
        echo      "<option>United States</option>";
        echo      "<option>France</option>";
        echo      "<option>Germany</option>";
        echo      "<option>Italy</option>";
        echo  "</select>"; // End

        }

    } */
?>

<!--   <a  class="dropdown-item" tabindex="-1" href="#">Hover me for more options</a>
  <ul class="dropdown-menu"> -->
