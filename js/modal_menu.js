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





  $(document).ready(function() {
    $("#but").click(function(){
        let villes = [];
        $.each($(".selectpicker option:selected"), function(){            
            villes.push($(this).val());
        });
        //console.log("ville selectione - " + villes.join(", "));

        console.log(villes);

        


        
        let arrayjs= JSON.stringify(villes);
        console.log(arrayjs);


        $.ajax({
            type: "POST",
                url: "getdata.php",
                data: {content : arrayjs},
                dataType: "text",
                success: function(html){
                alert( "Submitted");
                    }
          }); 
    });
});


//unchecks all data from picker
//visually it remains seelcted
$(document).ready(function() {
    $("#but2").click(function(){
        $('.selectpicker option').prop("selected", false).trigger('change');
    });
   });







    //console.log("i work!!!");