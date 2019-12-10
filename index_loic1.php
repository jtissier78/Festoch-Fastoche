<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css"media="screen"/>
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
  <img id="datepicker" src="http://jqueryui.com/resources/demos/datepicker/images/calendar.gif" alt="Date" > 
  <script src="js/datePicker.js"></script> 
</head>

<body>

<main>   
  <div class="contener-fluid col-sm-12 mb-4 main"> 
      <div class="row mr-1 ml-1">
        <!-- HEADER -->
        <div class= "container-fluid mt-4 mb-4 header">
        <div class="row">
            <div class="col-sm-12 ">
            <img class="img-fluid rounded" src="icons8.png">
            </div>
        </div>
        </div> 
            <!-- navbar -->
          <div class="container-fluid sidenav">
            <div class="row main">
                <div class="col-2 collapse show d-md-flex pt-2 pl-0 min-vh-100" id="sidebar">
                    <ul class="nav flex-column flex-nowrap overflow-hidden">
                        <li class="nav-item">
                            <a class="nav-link text-truncate" href="#"><i class="fa fa-home"></i> <span class="d-none d-sm-inline">Overview</span></a>
                            <input type="text" class="w16em" id="dp-1" name="dp-1" value="" /></p>
<script type="text/javascript">
// <![CDATA[     
var opts = {   
// Attach input with an id of "dp-1" and give it a "d-sl-m-sl-Y" date format (e.g. 13/03/1990)                      
formElements:{"dp-1":"d-sl-m-sl-Y"}                
};      
datePickerController.createDatePicker(opts);
// ]]>
</script>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-table"></i> <span class="d-none d-sm-inline"><!-- Search form -->
                            <form class="form-inline active-cyan-4">
                            <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                                aria-label="Search">
                            <i class="fas fa-search" aria-hidden="true"></i>
                            </form></span></a>
                            <div class="collapse" id="submenu1" aria-expanded="false">
                                <ul class="flex-column pl-2 nav">
                                    <li class="nav-item"><a class="nav-link py-0" href="#"><span>Orders</span></a></li>
                                    <li class="nav-item">
                                        <a class="nav-link collapsed py-1" href="#submenu1sub1" data-toggle="collapse" data-target="#submenu1sub1"><span>Customers</span></a>
                                        <div class="collapse" id="submenu1sub1" aria-expanded="false">
                                            <ul class="flex-column nav pl-4">
                                                <li class="nav-item">
                                                    <a class="nav-link p-1" href="#">
                                                        <i class="fa fa-fw fa-clock-o"></i> Daily </a>
                                                        <p><label for="dp-1">Date de réception : </label> :

                                                        
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link p-1" href="#">
                                                        <i class="fa fa-fw fa-dashboard"></i> Dashboard </a>

                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link p-1" href="#">
                                                        <i class="fa fa-fw fa-bar-chart"></i> Charts </a>  <script src="js/datePicker.js"></script> <img id="datepicker" src="http://jqueryui.com/resources/demos/datepicker/images/calendar.gif" alt="Date" > 

                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link p-1" href="#">
                                                        <i class="fa fa-fw fa-compass"></i> Areas </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link text-truncate" href="#"><i class="fa fa-bar-chart"></i> <span class="d-none d-sm-inline">Analytics</span></a></li>
                        <li class="nav-item"><a class="nav-link text-truncate" href="#"><i class="fa fa-download"></i> <span class="d-none d-sm-inline">Export</span></a></li>
                    </ul>
                </div>
                <!-- colone resultats -->
                <div class="col-10 pt-2 text-center result ">
                  <h2><br>
                      <a href="" data-target="#sidebar" data-toggle="collapse" class="d-md-none"><i class="fa fa-bars"></i></a>Recherche par type et par ville</h2>
              <!-- recherches modal -->
                                <div class="container">
                                    <div class="row">
                                        <a href="#" class="btn btn-default " data-toggle="modal" data-target="#myModal">Recherche</a>
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
                                                    <span> </span>
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
                                                    <span> </span>
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
                                                    <span> </span>
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
                                                    <span> </span>
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
                                                    <span> </span>
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
                                                    <span> </span>
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
                                                  <br><br>
                          <div class="col-12 pt-3 titreresult">
                            <h2>
                                <a href="" data-target="#sidebar" data-toggle="collapse" class="d-md-none"><i class="fa fa-bars"></i></a>kikouuu</h2>
                            <h6 class="hidden-sm-down"></h6>
                          </div>
                            <!-- colone resultats -->
                            <div class="col-12 pt-3 mb-5 resultrecherche">
                            <h2>
                                <a href="" data-target="#sidebar" data-toggle="collapse" class="d-md-none"><i class="fa fa-bars"></i></a>  </h2>
                            <h6 class="hidden-sm-down"></h6>
                          </div>
                          </div>  
                      </div>
                      </div>
              </div>
              <!-- FOOTER -->
    <footer>
      <div class="container-fluid mt-4"> 
        <div class="row "> 
          <div class="col-sm-12 "> 
          </div>
        </div>
        </div>  <script></script>  
        <p>Footer</p>
    </footer>
            </div>
            </div>
  
</main>

<script type="application/javascript" src="jquery-ui/js/jquery-1.9.1.js"></script>  
<script type="application/javascript" src="jquery-ui/js/jquery-ui-1.10.3.custom.js"></script> 
<script type="application/javascript" src="jquery-ui/js/jquery.ui.datepicker-fr.js"></script>
</body>
</html>





 
