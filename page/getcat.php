<?php
     session_start();

    require "../DataBaseConnect/Classes/Connexion.php";

    $new_pdo = new Connexion();

    $conn= $new_pdo->PDOInit();

    

    $data= [];
    $result= [];

    
    if(isset($_SESSION["search"])== true && strlen($_SESSION["search"])>2 && strlen($_SESSION["cate"])>2){

       // var_dump($_SESSION["search"]);
       // var_dump($_SESSION["cate"]);
    //transforms ajax string into an array
    $result = json_decode(stripslashes($_SESSION["search"]));


    foreach($result as $k=> $res){
        $stmt = $conn->prepare("SELECT * FROM festival where id_commune=$res");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach($stmt->fetchAll() as $n=>$v) {
                $festivalid[$n] =$v['id'];
                $festivalnom[$n] =$v['nom'];
                $festivalurl[$n] =$v['url'];
                $festivalnum[$n] =$v['numIdentif'];
                $festivaldateC[$n] =$v['DateCreation'];
                $festivalperiodicite[$n] =$v['Periodicite'];
                $festivallongitude[$n] =$v['Longitude'];
                $festivallatitude[$n] =$v['Latitude'];
                
                
        }
    }

    //var_dump( $festivalid);
   
    //var_dump($festivalid);


    //transforms ajax string into an array
    $data = json_decode(stripslashes($_SESSION["cate"]));

        if(sizeof($data)>0){
            //select the categorie name
            $y=0;
            foreach($data as $k=>$dat){
            $stmt = $conn->prepare("SELECT * FROM categorie where id=$dat");
                    $stmt->execute();

                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach($stmt->fetchAll() as $n=>$v) {
                        $nom_cat[$y]= $v['nom'];
                        $y++;
                    }
            }


            //select the id's of festivals for the categorie selected
            $a=0;
            foreach($data as $k=>$dat){

                $stmt = $conn->prepare("SELECT * FROM liencatfest where id_Categorie=$dat");
                    $stmt->execute();

                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach($stmt->fetchAll() as $n=>$v) {
                        $festList[$a]=$id_fest[$k][$n]= $v['id_Festival'];
                        $a++;
                    }
                }

                //select each festival info
                foreach($festList as $k=>$fest){
                    $stmt = $conn->prepare("SELECT * FROM festival where id=$fest");
                    $stmt->execute();
            
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach($stmt->fetchAll() as $n=>$v) {
                            $festival_id[$k]=$v['id'];
                            $festival_nom[$k] =$v['nom'];
                            $festival_url[$k] =$v['url'];
                            $festival_num[$k] =$v['numIdentif'];
                            $festival_dateC[$k] =$v['DateCreation'];
                            $festival_periodicite[$k] =$v['Periodicite'];
                            $festival_longitude[$k] =$v['Longitude'];
                            $festival_latitude[$k] =$v['Latitude'];
                            
                            
                    }
                
                }
                    //fisplay each festival on screen
                    foreach($id_fest as $k=>$festid)
                    { 
                        echo "$nom_cat[$k] :<br>";
                        foreach($festid as $i=> $fest){
                        echo "<ul>";
                            foreach($festival_id as $l=>$id){

                            if($fest == $id){
                                foreach($festivalid as $valid){
                                   if($valid==$id){
                                    echo "<li>";
                                        if(isset($festival_nom[$l])) {echo "Nom: ".$festival_nom[$l]."<br>";} //veryfy if exists and if does will type it
                                        if(isset($festival_url[$l])) {echo "Web Site: ".$festival_url[$l]."<br>";}
                                        if(isset($festival_num[$l])) {echo "Identifiant: ".$festival_num[$l]."<br>";}
                                        if(isset($festival_dateC[$l]))  {echo "Date Creation: ".$festival_dateC[$l]."<br>";}                            
                                        if(isset($festival_periodicite[$l])) {echo "Periodicite: ".$festival_periodicite[$l]."<br>";}
                                        if(isset($festival_longitude[$l])) {echo "Longitude: ".$festival_longitude[$l]."<br>";}
                                        if(isset($festival_latitude[$l])) {echo "Latitude: ".$festival_latitude[$l]."<br>";}
                                        echo "<br><br><br>";     
                                        echo "</li>";
                                   }
                                }
                            }                    
                        echo "</ul>"; 
                    }
                }
            } 
        }
    }





else if(isset($_SESSION["search"])== false || strlen($_SESSION["search"])<=2){
    //transforms ajax string into an array
    $data = json_decode(stripslashes($_SESSION["cate"]));

    if(sizeof($data)>0){
        //select the categorie name
        $y=0;
        foreach($data as $k=>$dat){
        $stmt = $conn->prepare("SELECT * FROM categorie where id=$dat");
                $stmt->execute();

                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach($stmt->fetchAll() as $n=>$v) {
                    $nom_cat[$y]= $v['nom'];
                    $y++;
                }
        }


        //select the id's of festivals for the categorie selected
        $a=0;
        foreach($data as $k=>$dat){

            $stmt = $conn->prepare("SELECT * FROM liencatfest where id_Categorie=$dat");
                $stmt->execute();

                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach($stmt->fetchAll() as $n=>$v) {
                    $festList[$a]=$id_fest[$k][$n]= $v['id_Festival'];
                    $a++;
                }
            }

            //select each festival info
            foreach($festList as $k=>$fest){
                $stmt = $conn->prepare("SELECT * FROM festival where id=$fest");
                $stmt->execute();
        
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach($stmt->fetchAll() as $n=>$v) {
                        $festival_id[$k]=$v['id'];
                        $festival_nom[$k] =$v['nom'];
                        $festival_url[$k] =$v['url'];
                        $festival_num[$k] =$v['numIdentif'];
                        $festival_dateC[$k] =$v['DateCreation'];
                        $festival_periodicite[$k] =$v['Periodicite'];
                        $festival_longitude[$k] =$v['Longitude'];
                        $festival_latitude[$k] =$v['Latitude'];
                        
                        
                }
            
            }
                //fisplay each festival on screen
                foreach($id_fest as $k=>$festid)
                { 
                    echo "$nom_cat[$k] :<br>";
                    foreach($festid as $i=> $fest){
                    echo "<ul>";
                        foreach($festival_id as $l=>$id){

                        if($fest == $id){
                        echo "<li>";
                            if(isset($festival_nom[$l])) {echo "Nom: ".$festival_nom[$l]."<br>";} //veryfy if exists and if does will type it
                            if(isset($festival_url[$l])) {echo "Web Site: ".$festival_url[$l]."<br>";}
                            if(isset($festival_num[$l])) {echo "Identifiant: ".$festival_num[$l]."<br>";}
                            if(isset($festival_dateC[$l]))  {echo "Date Creation: ".$festival_dateC[$l]."<br>";}                            
                            if(isset($festival_periodicite[$l])) {echo "Periodicite: ".$festival_periodicite[$l]."<br>";}
                            if(isset($festival_longitude[$l])) {echo "Longitude: ".$festival_longitude[$l]."<br>";}
                            if(isset($festival_latitude[$l])) {echo "Latitude: ".$festival_latitude[$l]."<br>";}
                            echo "<br><br><br>";     
                            echo "</li>";
                            }                    
                    echo "</ul>"; 
                }
            }
        } 
    }
}


?>