$(function() {
  


    $('#datepicker').daterangepicker({
      linkedCalendars:false,
      autoApply:true,
      alwaysShowCalendars:true,
      showDropdowns: true,
      minYear: 2015,
      ranges:{
        "Aujourd'hui":[moment(),moment()],
        "Ce Week-end":[],
        "Cette semaine":[moment().startOf('week'),moment().endOf('week')],
        "Semaine Prochaine":[moment().add('week',1).startOf('week'),moment().add('week',1).endOf('week')],
        "Ce Mois":[moment().startOf('month'),moment().endOf('month')],
        "Mois prochain":[moment().add('month',1).startOf('month'),moment().add('month',1).endOf('month')]
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
    
  });