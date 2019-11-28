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

<main>
 


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



<div class="container">
  <!-- <div class="form-group">
  <select class="selectpicker" multiple>
  <option>Mustard</option>
  <option>Ketchup</option>
  <option>Barbecue</option>
</select>

  </div> -->



  <div class="modal_menu">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal">Recherche</button>

     <div class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="form-group">
  
              <select class="selectpicker">
              <option value="" disabled selected>Indiquez Votre Recherche</option>
                <optgroup label="Group 1">
                  <option value="1">Region</option>
                  <option value="2">Option 2</option>
                </optgroup>
                <optgroup label="team 2">
                  <option value="3">Option 3</option>
                  <option value="4">Option 4</option>
                </optgroup>
              </select>
              <button class="btn-save btn btn-primary btn">Save</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
  </div> 
</div>
</main>

<footer>
  <div class="col-sm-12 text-center">
</div>


  <p>Footer</p>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>


  <!-- rui' script -->
  <script src="js/vendor/bootstrap-select.min.js" async></script>
  <script src="js/modal_menu.js" async></script>


</body>

</html>