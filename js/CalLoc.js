
$(function() {   
  $('#datepicker').daterangepicker({  //TODO Semaine dois commencer lundi.
    linkedCalendars:false,
    autoApply:true,
    alwaysShowCalendars:true,
    showDropdowns: true,
    minYear: 2015,
    ranges:{
      "Aujourd'hui":[moment(),moment()],
      "Ce Week-end":[],
      "Cette semaine":[moment().startOf('week'),moment().endOf('week')],
      "Semaine Prochaine":[moment().add(1,'week').startOf('week'),moment().add(1,'week').endOf('week')],
      "Ce Mois":[moment().startOf('month'),moment().endOf('month')],
      "Mois prochain":[moment().add(1,'month').startOf('month'),moment().add(1,'month').endOf('month')]
    },
    "locale":{
      "format": "DD/MM/YY",
      "applyLabel":"Valider",
      "CancelLabel":"Annuler",
      "CustomRangeLabel":"Choisir",
      "firstDay":1,
      "daysOfWeek":["Di","Lu","Ma","Me","Je","Ve","Sa"],
      "monthNames":["Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"]
    }
  });
  $('#datepicker').on('apply.daterangepicker',function (event, picker) {
    event.preventDefault();
    $.post(
      "function/ForDate.php",
      {
        begin : picker.startDate.format('YYYY-MM-DD'),
        ending : picker.endDate.format('YYYY-MM-DD')
      },
      function (data) {
        if (data=="Success") {
          
          
          $("#resultrecherche").load('page/GeoLocaliseResult.php');
          console.log(picker.startDate.format('YYYY-MM-DD'));
          console.log(picker.endDate.format('YYYY-MM-DD'));
        } else {
          $("#resultrecherche").html("Erreur dans la correction de votre questionnaire.");
        }
      }
    );
    
  });
  
  $("#geoLoc").click(function (event) {
    event.preventDefault();
    if(navigator.geolocation){
      navigator.geolocation.getCurrentPosition(showLocation,showError);
    }else{ 
      $('#location').html('Geolocation is not supported by this browser.');
    }
    
      
  });
});



/**
 * @author JTissier <jtissier78@gmail.com>
 * @param {NewType} position 
 */
function showLocation(position){
  var Latitude = position.coords.latitude;
  var Longitude = position.coords.longitude;
  $.post(
    'function/GeoLocal.php',
    {
        longitude: Longitude,
        latitude: Latitude,
        distance: 50
    },
    function (data) {
      if (data=='Success') {
        $("#resultrecherche").load('page/GeoLocaliseResult.php');
        
                                                                      
      } else{
        $("#resultrecherche").html("Erreur dans la correction de votre questionnaire.");
      }
    }
  );
}


/**
 * @author JTissier <jtissier78@gmail.com>
 * @param {*} error 
 */
function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      $("#Demo").html ("User denied the request for Geolocation.");
      break;
    case error.POSITION_UNAVAILABLE:
      $("#Demo").html ("Location information is unavailable.");
      break;
    case error.TIMEOUT:
      $("#Demo").html ("The request to get user location timed out.");
      break;
    case error.UNKNOWN_ERROR:
      $("#Demo").html ("An unknown error occurred.");
      break;
  }
}