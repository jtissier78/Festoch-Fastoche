<?php 
session_start();


require "../DataBaseConnect/Classes/Connexion.php";


if(isset($_SESSION["search"])== true && isset($_SESSION["cate"])==false){



$result= [];
//transforms ajax string into an array
$result = json_decode(stripslashes($_SESSION["search"]));

$max=sizeof($result);
//var_dump($result);
//innitiates connexion to server
$new_pdo = new Connexion();

$conn= $new_pdo->PDOInit();


//select info from festival

foreach($result as $k=> $res){
        $stmt = $conn->prepare("SELECT * FROM festival where id_commune=$res");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $n=>$v) {
                $festival_id[$k][$n] =$v['id'];
                $festival_nom[$k][$n] =$v['nom'];
                $festival_url[$k][$n] =$v['url'];
                $festival_num[$k][$n] =$v['numIdentif'];
                $festival_dateC[$k][$n] =$v['DateCreation'];
                $festival_periodicite[$k][$n] =$v['Periodicite'];
                $festival_longitude[$k][$n] =$v['Longitude'];
                $festival_latitude[$k][$n] =$v['Latitude'];
                
                
        }
    }

    //var_dump($festival_latitude);

    echo "<div class='container'>";
    echo "<div class='row'>";
        
    for($i=0;$i<$max;$i++){
        if(isset($festival_nom[$i][0]))
        {
            echo "<ul>";
            $exit=false;
            $j=0;
            do{
                if(isset($festival_nom[$i][$j]))
                {
                echo "<li>";
                echo "Nom: ".$festival_nom[$i][$j]."<br>";
                    if(isset($festival_url[$i][$j])) {echo "Web Site: ".$festival_url[$i][$j]."<br>";}
                    if(isset($festival_num[$i][$j])) {echo "Identifiant: ".$festival_num[$i][$j]."<br>";}
                    if(isset($festival_dateC[$i][$j]))  {echo "Date Creation: ".$festival_dateC[$i][$j]."<br>";}
                    if(isset($festival_periodicite[$i][$j])) {echo "Periodicite: ".$festival_periodicite[$i][$j]."<br>";}
                    if(isset($festival_longitude[$i][$j])) {echo "Longitude: ".$festival_longitude[$i][$j]."<br>";}
                    if(isset($festival_latitude[$i][$j])) {echo "Latitude: ".$festival_latitude[$i][$j]."<br>";}
                    echo "<br><br><br>";

                echo "</li>";
                $j++;
                }
                else{
                    $exit= true;
                }
                
            }while($exit==false);
            echo "</ul>";
        }
        else{
            echo "Il n'y a pas de festivals ici!!";
        }
    }

    echo "</div>";
    echo "</div>";

}

else if(isset($_SESSION["search"])== true && isset($_SESSION["cate"])==false){
    
}

?>
