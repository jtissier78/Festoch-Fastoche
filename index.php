<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  <!-- Stylesheet of calendar -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>

  <!-- Script jquery -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <!-- Script date rangepicker -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

  <script src="js/datePicker.js"></script> <!-- TODO Insert <img id="datepicker" src="http://jqueryui.com/resources/demos/datepicker/images/calendar.gif" alt="Date" > where we want to use DatePicker. -->
</head>
<body>

<header class="container-fluid ">
<div class="row content">
<div class="col-sm-1  logo"> 
      </div>
      <div class="col-sm-2 vide"> 
      </div>
      <div class="col-sm-7 visible-lg titreHeader"> 
      </div>
      </div>
</header>

<div class="row">
  <div class="col-sm-9">
    Level 1: .col-sm-9
    <div class="row">
      <div class="col-8 col-sm-6">
        Level 2: .col-8 .col-sm-6
      </div>
      <div class="col-4 col-sm-6">
        Level 2: .col-4 .col-sm-6
      </div>
    </div>
  </div>
</div>

<!-- navbar -->
    <div class="container-fluid text-center">    
      <div class="row content">
        <div class=" col-sm-2 hidden-xs hidden-sm hidden-md sidenav">
          <p><a href="#">Link</a></p>
          <p><a href="#">Link</a></p>
          <p><a href="#">Link</a></p>
       </div>
     </div>
    </div>


    <div class="col-sm-9 text-left centrale"> 
<div class="col-sm-2 "> 

<!-- recherches modal -->
<div class="container">
	<div class="row">
		<h2>Recherche par type et par ville</h2>
		<a href="#" class="btn btn-default" data-toggle="modal" data-target="#myModal">Recherche</a>
	</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Sélectionnez vos critères</h4>
      </div>
      <div class="modal-body">
         <div class="[ form-group ]"><!-- checkbox -->
            <input type="checkbox" name="fancy-checkbox-default" id="fancy-checkbox-default" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-default" class="[ btn btn-default ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-default" class="[ btn btn-default active ]">
                <h8>Nom de la ville</h8>
                </label>
            </div>
        </div><!-- checkbox -->
        <div class="[ form-group ]"><!-- checkbox -->
            <input type="checkbox" name="fancy-checkbox-default1" id="fancy-checkbox-default1" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-default1" class="[ btn btn-default ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-default1" class="[ btn btn-default active ]">
                <h8>Nom de la ville</h8>
                </label>
            </div>
        </div><!-- checkbox -->
        <div class="[ form-group ]"><!-- checkbox -->
            <input type="checkbox" name="fancy-checkbox-default2" id="fancy-checkbox-default2" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-default2" class="[ btn btn-default ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-default2" class="[ btn btn-default active ]">
                <h8>Nom de la ville</h8>
                </label>
            </div>
        </div><!-- checkbox -->
        <div class="[ form-group ]"><!-- checkbox -->
            <input type="checkbox" name="fancy-checkbox-default3" id="fancy-checkbox-default3" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-default3" class="[ btn btn-default ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-default3" class="[ btn btn-default active ]">
                <h8>Nom de la ville</h8>
                </label>
            </div>
        </div><!-- checkbox -->
        <div class="[ form-group ]"><!-- checkbox -->
            <input type="checkbox" name="fancy-checkbox-default4" id="fancy-checkbox-default4" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-default4" class="[ btn btn-default ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-default4" class="[ btn btn-default active ]">
                <h8>Nom de la ville</h8>
                </label>
            </div>
        </div><!-- checkbox -->
        <div class="[ form-group ]"><!-- checkbox -->
            <input type="checkbox" name="fancy-checkbox-default5" id="fancy-checkbox-default5" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-default5" class="[ btn btn-default ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-default5" class="[ btn btn-default active ]">
                    <h8>Nom de la ville</h8>
                </label>
            </div>
        </div><!-- checkbox -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Valider</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


      <div class="col-sm-9 text-center text-left result"> 
      
    </div>
    </div>
  </div>
 

<footer class="container-fluid text-center">
  <p>Footer</p>
</footer>

</body>
</html>