<?php 

//start function by default set to visitor
session_start();
if(isset($_SESSION['userName'])) {
  echo "Your session is running " . $_SESSION['userName'];
}
else {
    $_SESSION['userName'] = "visitor";
}

?>


<body>
    <div> <!-- your main div/section -->
        <form action="verifylog.php" method="post" class="form_user">  <!-- attention to url path -->
            <h6>Username:</h6> <input type="text" name="adminlog"><br>
            <h6>PassWord:</h6> <input type="text" name="pwlog"><br><br>
            <input type="submit">
        </form>
    </div>

</body>
</html>