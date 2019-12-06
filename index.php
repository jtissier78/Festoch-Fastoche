<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css">


  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<?php session_start(); ?> <!-- session start, necessary for data treatment -->


</head>

<body>
<!-- header -->
<header>
<div class= "container-fluid">
<div class="row ">
<div class="col-sm-12 ">
<div class="row">
<div class="col-xs-2 hidden-xs hidden-sm hidden-md logo"> 
      </div>
      <div class="col vide"> 
      </div>
  </div>
</div>  
</div>
</div>
</header>

<div class="container">




  <div class="modal_menu">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal">Recherche</button>

    <div class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">




    <div class="container">
  	  <div class="row">
        <h5>Choisissez votre recherche</h5>
        
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Region
            </button>
            
              <!-- modal content -->
              <?php include("page/region.php"); ?>

        </div>

        <div class="modal-footer">
        <button id="but" type="button" class="btn btn-primary">Save </button> <!-- Saves data searched -->
        <button id="but2" type="button" class="btn btn-primary">Reset </button> <!-- resets data searched -->
        <button id="but3" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <!-- close modal -->

      </div>
      </div>
    </div>
<!-- end -->
          
        </div>
      </div>
  </div> 
</div>


<!-- button categorie -->
<div class="categorie">
  <?php include("page/categorie.php") ?>


    </div>

    

<main id="main">
 


    <div class="col-sm-12 centrale"> 
    <div class="row ">

    <!-- navbar -->

    <div class=" col-sm-1 hidden-xs hidden-sm hidden-md  sidenav">
          <p><a href="#">Link</a></p>
          <p><a href="#">Link</a></p>
          <p><a href="#">Link</a></p>
        </div>
             <!-- div resultat --> 
    <div class="col-sm-10 container text-center result">
    <div class="col-sm-10 container text-center resultrecherche">
    </div>
</div>

<body>
<!-- HEADER -->
    <header>
        <div class= "container-fluid">
          <!-- <div class="row "> -->
            <div class="col-sm-12 ">
              <div class="row">
                <div class="col-xs-2 logo"> 
                <img class="img-fluid rounded" src="icons8.png" alt="photo de profil">
                </div>
                <div class="col vide"> 
                </div>
            <!--   </div> -->
            </div>  
          </div>
        </div>
    </header>

    </main>













<footer>
  <div class="col-sm-12 text-center">
</div>


  <p>Footer</p>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>

  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="   
  crossorigin="anonymous"></script>  <!-- ajax script lib -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>


  <!-- rui' script -->
  <script src="js/vendor/bootstrap-select.min.js" async></script>
  <script src="js/modal_menu.js" async></script>
  <script src="js/categorie.js" async></script>

<?php 

//saves values of search to use them on getdata.php
if(isset($_POST['content'])){
  $_SESSION["search"]=$_POST['content'];
  }
  
   if(isset($_POST['global'])){
    $_SESSION["global"]=$_POST['global'];
    }

  if(isset($_POST['cate'])) {
    $_SESSION["cate"]=$_POST['cate'];
  } 
  
  ?>

  

</body>


</html>
