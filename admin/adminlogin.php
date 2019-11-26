<?php 

//start function by default set to visitor


if (session_status() == PHP_SESSION_NONE) { //verify if session is already started
    session_start();
}
$_SESSION['userName'] = "visitor";
if(isset($_SESSION['userName'])) {
  echo "Your session is running " . $_SESSION['userName'];
}
else {
    $_SESSION['userName'] = "visitor";
}

?>


<body>

    <div> <!-- your main div/section -->

    <?php
        $user = $_SESSION['userName'];

        if(strcmp($user,"visitor")==0){ //verify if user is connected, if not charges form.
            echo "<form action='verifylog.php' method='post' class='form_user'>";  //attention to url path
            echo "<h6>Username:</h6> <input type='text' name='adminlog'><br>";
            echo "<h6>PassWord:</h6> <input type='text' name='pwlog'><br><br>";
            echo "<input type='submit'>";
            echo "</form>";
        }
        else {
            echo "<h3>You are already connected!!</h3>";
        }
    ?>
    </div>

</body>
</html>