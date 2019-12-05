<?php 
session_start();


require "../DataBaseConnect/Classes/Connexion.php";


//transforms ajax string into an array
$data = $_SESSION["global"];

//var_dump($result);
//innitiates connexion to server
 $new_pdo = new Connexion();

$conn= $new_pdo->PDOInit();

//var_dump($result);

//select info from regions
$stmt = $conn->prepare("SELECT * FROM regions where nom= '$data'");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $k=>$v) {
            $regions[$k]= $v['nom'];
            $regions_id = $v['id'];
        }

/*         if($regions_id>0 && $regions_id<5){
            echo "<h1>Il n'y a pas de festivals ici!!<br></h1>";
        }

else{ */
        //var_dump($regions_id);
    if(isset($regions)){ //if user clicked in a region

        $a=0;
        $stmt = $conn->prepare("SELECT * FROM departements where id_Region=$regions_id");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $k=>$v) {
                $dep_id[$k]= $v['id'];
            }




            //select info from commune
        foreach($dep_id as $id){
            $stmt = $conn->prepare("SELECT * FROM commune where id_Departement=$id");
            $stmt->execute();

            foreach($stmt->fetchAll() as $v) {
                $com_id[$a]= $v['id'];
                $a++;
            }
        }

            if(isset($com_id))
            {
                $max=sizeof($com_id);
                        
                //select festival data
                foreach($com_id as $k=> $id){
                        $stmt = $conn->prepare("SELECT * FROM festival where id_commune=$id");
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
                        
                    for($i=0;$i<$max;$i++){   //display all data for each single festival
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
                            echo "Il n'y a pas de festivals avec ce nom!!";
                        }
                    }

                    echo "</div>";
                    echo "</div>";
        
            }
            else{
                echo "Il n'y a pas de festivals a $com_nom[$i]!!";
            }
    
        }









    else { //if user clicked in a department
        
        $stmt = $conn->prepare("SELECT * FROM departements where nom='$data'");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $k=>$v) {
                $dep_id= $v['id'];
            }

            //select info from commune
            $stmt = $conn->prepare("SELECT * FROM commune where id_Departement=$dep_id");
            $stmt->execute();

            foreach($stmt->fetchAll() as $k=> $v) {
                $com_id[$k]= $v['id'];
                $com_nom[$k]=$v['nom'];
                
            }
        


    $max=sizeof($com_id);
            
    //select festival data
    foreach($com_id as $k=> $id){
            $stmt = $conn->prepare("SELECT * FROM festival where id_commune=$id");
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
            
        for($i=0;$i<$max;$i++){   //display all data for each single festival
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
                echo "Il n'y a pas de festivals a $com_nom[$i]!!";
            }
        }

        echo "</div>";
        echo "</div>";
    }

//}
?>
