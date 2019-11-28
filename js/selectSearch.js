/* let but = document.getElementById('but');
let main = document.getElementById('main');

function saveResponseCheck()
{
    var selected = new Array();

    $(document).ready(function() {

    $("input:checkbox[name=option]:checked").each(function() {
       selected.push($(this).val());
       //console.log(selected);
    });

});
return selected;
}

function createForm(array)
{

    main.innerHTML ='';

        let form = main.appendChild(document.createElement('form'));

        form.name = 'input';
        form.action = 'html_form_action.asp';
        form.method = 'post';
        for(let i=0 ; i<array.length; i++){

        form.appendChild(document.createTextNode(array[i]+': '));

    //for(let i=0; i<array.lenght; i++){
        
        let input = form.appendChild(document.createElement('input'));
        input.type = 'text';
        input.name = i;
        input.value = 'Entrez votre Cherche';
        input.id = i;

        input = form.appendChild(document.createElement('br'));
        input = form.appendChild(document.createElement('br'));

        }
        

    //}

    input = form.appendChild(document.createElement('input'));
    input.type = 'button';
    input.value = 'Cherche';
    input.id = 'but2';
}


but.addEventListener("click",function(event){

    let option=saveResponseCheck();
    console.log(option);
    
    //console.log(option[3]);

    if(option!== 'undefined'){
        createForm(option);

        console.log(option.length);
            
    }

    let but2 = document.getElementById('but2');

        but2.addEventListener("click",function(event){
            let region = document.getElementById('0');

            let ville = document.getElementById('1');


            console.log(region.value);
            console.log(ville.value);

            

        });


/*     let but2 = document.getElementById('but2');

        but2.addEventListener("click",function(event){
            console.log("i was pressed!");
        }); */

//}); 






/*    $('#but').on('click', function(){
    $('#main').load('page/searchformCity.php');
    $('#wtf').hide();
  }); */






