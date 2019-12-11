//get main id
//let container= document.getElementById('main_cont');


//selects elements on menu
$(function () {
    $('.selectpicker').selectpicker();
});


//allow click on selectpicker menu
$(function() {
    // ------------------------------------------------------- //
    // Multi Level dropdowns
    // ------------------------------------------------------ //
    $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
      event.preventDefault();
      event.stopPropagation();
  
      $(this).siblings().toggleClass("show");
  
  
      if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
      }
      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
        $('.dropdown-submenu .show').removeClass("show");
      });
  
    });
  }); 


//event click to get the values selected by the selectpicker
  $(document).ready(function() {  
    $("#but").click(function(){
        let villes = [];
        $.each($(".selectpicker option:selected"), function(){            
            villes.push($(this).val());
        });
        //console.log("ville selectione - " + villes.join(", "));

        console.log(villes);

        
        //transforms array villes into a string
        let arrayjs= JSON.stringify(villes);
        console.log(arrayjs);

        
        //sends the string of ids to the index
        $.ajax({
            type: "POST",
                url: "index.php",
                data: {content : arrayjs},
                dataType: "text",
/*                 success: function(html){
                alert( "Submitted");
                    } */
          }); 

          document.getElementById('but3').click();
          $('#resultrecherche').load('../page/getdata.php');
        
    });
});


//unchecks all data from picker
//visually it remains selected
$(document).ready(function() {
    $("#but2").click(function(){
        $('.selectpicker option').prop("selected", false).trigger('change');
    });
   });


/* $('#regionlist li').on('click', function(){
    $('#datebox').val($(this).text());
}); */


$(".dropdown-menu li a").click(function(){
    var selText = $(this).text();


    console.log(selText);


    $.ajax({
        type: "POST",
            url: "index.php",
            data: {global : selText},
            dataType: "text",
            /* success: function(html){
            alert( "Submitted");
                } */
      });

      document.getElementById('but3').click();
      $('#resultrecherche').load('page/getglobal.php');

  });
