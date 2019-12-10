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
}

$stmt = $conn->prepare("SELECT * FROM departements");
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach($stmt->fetchAll() as $k=>$v) {
        $dep_nom[$k] =$v['nom'];
        $id_dep_reg[$k] = $v['id_Region'];
}





//var_dump($id_dep_reg);

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
                  echo    "<li class='dropdown-item'><a href='#'>3rd level</a></li>";
                  echo "</ul>";
                  echo "</li>";
               }
             }

      echo "</li>";
             
      
      echo      "<li class='dropdown-submenu'><a class='dropdown-item' href='#'>another level</a>";
        echo        "<ul class='dropdown-menu'>";
      echo            "<li class='dropdown-item'><a href='#'>4th level</a></li>";
      echo            "<li class='dropdown-item'><a href='#'>4th level</a></li>";
      echo            "<li class='dropdown-item'><a href='#'>4th level</a></li>";
        echo        "</ul>";
       echo      "</li>";
      
      /* echo  "</ul>"; */
      echo "</li>"; 
      echo "</ul>";
      echo "</li>";

      }
      echo "</ul>";
?>

<!--   <a  class="dropdown-item" tabindex="-1" href="#">Hover me for more options</a>
  <ul class="dropdown-menu"> -->
