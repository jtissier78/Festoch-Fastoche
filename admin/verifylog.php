<?php 

//start function by default set to visitor
session_start();
if(isset($_SESSION['userName'])) {
  echo "Your session is running " . $_SESSION['userName'];
}
else {
    $_SESSION['userName'] = "visitor";
}

//test db
$DB_USER='test';
$DB_PASSWORD='12345';
$DB_HOST= 'localhost';
$DB_NAME='testDB';

$TB_ADMIN = "Admin";


/* try {
    //create de DB
    $conn = new PDO('mysql:host='.$DB_HOST,$DB_USER,$DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}

$requete = "CREATE DATABASE IF NOT EXISTS $DB_NAME DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";

$conn->prepare($requete)->execute(); */

//conexion to server
$conn = new PDO("mysql:host=".$DB_HOST.";dbname=".$DB_NAME,$DB_USER,$DB_PASSWORD);


//create table Admin
/* try{
    $admin = "CREATE TABLE IF NOT EXISTS $TB_ADMIN (
        ID_per int(2) AUTO_INCREMENT NOT NULL,
        Username varchar(255),
        PassW varchar(255),
        PRIMARY KEY (ID_per)
        )";

        $conn->prepare($admin)->execute();
        echo " SUCCESS IN PERSONE ";
}catch (PDOException $e) {
    echo 'ERROR IN PAYS : ' . $e->getMessage();
}

//insert two test admins
try {
    $admin1 = "INSERT INTO $TB_ADMIN (Username, PassW)
    VALUES ('Extreme','AdminRulls')";
    $conn->prepare($admin1)->execute();
    echo 'DEV INSERTED';
}catch (PDOException $e) {
    echo 'ERROR IN INSERT : ' . $e->getMessage();
}

try {
    $admin2 = "INSERT INTO $TB_ADMIN (Username, PassW)
    VALUES ('UberPower','DevPassUltimate')";
    $conn->prepare($admin2)->execute();
    echo 'DEV INSERTED';
}catch (PDOException $e) {
    echo 'ERROR IN INSERT : ' . $e->getMessage();
} */


var_dump($_POST);

//var initialization
$pwinserted = false;
$userinserted = false;
$incorrect = false;
$postnick = $_POST["adminlog"];
$postpw = $_POST["pwlog"];

//requires db connection 
//select user data from table admin
$stmt = $conn->prepare("SELECT * FROM $TB_ADMIN");
$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach($stmt->fetchAll() as $k=>$v) {
        $nick[$k] =$v['Username'];
        $pass[$k] = $v['PassW'];    
}

$size = sizeof($nick);


//compare db_data with user data
for($i=0 ; $i<$size ; $i++) {
    if(strcmp($nick[$i],$postnick) ==0){
        $userinserted = TRUE;
        if(strcmp($pass[$i],$postpw) ==0){
            $pwinserted = TRUE;
        }
    }
}

if(($userinserted==TRUE && $pwinserted==TRUE)){
    $_SESSION['userName'] = $postnick;
    
    //echo $_SESSION['userName'];
}

?>

<body>
<?php
    if(($userinserted==TRUE && $pwinserted==TRUE)){
        echo "<h3>Session Started</h3>";
        //echo $_SESSION['userName'];
    }

    if(($userinserted==FALSE && $pwinserted==TRUE) ||($userinserted==TRUE && $pwinserted==FALSE)||(($userinserted==FALSE && $pwinserted==FALSE))){
        $incorrect = true;
    }

    if($incorrect==true)
    {
        echo "<h3>Values inserted were Incorrect</h3>";
        include("adminlogin.php"); //atention to url path
    }
?>

</body>