const { func } = require("prop-types");

var form = document.querySelector("#personnageForm")

$(document).on('change', '#edit_personnage_numberRecompences,#edit_personnage_numberVertus,#edit_personnage_numberArmes,#personnage_valeurPrincipale,#personnage_attributCoeur,#personnage_attributCorps, #personnage_classe, #personnage_origine, #personnage_vocation', function(){
    form.submit();
})


//AJAX de l'ajout d'amis
$(document).on('click', '#ajaxAddFriend', function(e){
  e.preventDefault()
  ajax_simple(this.value)
})

$(document).on('click', '.deletFriend', function(e){
  e.preventDefault()
  ajax_simple(this.value)
})


$(document).on('change', 'input[type=checkbox]', function(e){
  e.preventDefault()
  // Si j'ai un id de partie je redirige vers la modification de partie sinon creation
  $('#partieNumber').val() ?ajax_form($('#ajaxCreatePartie').val()+'/'+$('#partieNumber').val(),$('[name=partie]')):ajax_form($('#ajaxCreatePartie').val() ,$('[name=partie]') )
})

$(document).on('click', '#endPartie', function(e){
  $('#endPartie').hide()
  $('#endPartieCancel').show()
  $('#generate_de').hide()
  $('.showModifPerso').show()
})
$(document).on('click', '#endPartieCancel', function(e){
  $('#endPartie').show()
  $('#endPartieCancel').hide()
  $('#generate_de').show()
  $('.showModifPerso').hide()
})




if ($('#is_modif').val() == 1) {
  $('#endPartie').hide()
  $('#endPartieCancel').show()
  $('#generate_de').hide()
  $('.showModifPerso').show()
}

//AJAX pour la recherche d'amis
$(document).on('click', '#submit_friend', function(e){
  e.preventDefault()
  let form = $('[name=recherche_amis]')
  let path_friend = $('#path_friend').val();
  ajax_form(path_friend ,form )
})

function ajax_form(url, form){

  $.ajax({
    method: 'POST',
    url: url,
    data: form.serialize(),
    dataType: "HTML",
}).done( function(response) {
  // Je split pour récupérer et changer que le body
  let splitResponse1 = response.split('</barre-navigation>')[1];
  let splitResponse = splitResponse1.split('<script>')[0]

   $(".replaceAjaxContent").html(splitResponse);
}).fail(function(jxh,textmsg,errorThrown){
    console.log(textmsg);
    console.log(errorThrown);
});
}


function ajax_simple(url){

      $.ajax({
        method: 'POST',
        url: url,
        dataType: "HTML",
    }).done( function(response) {
      let splitResponse1 = response.split('</barre-navigation>')[1];
      let splitResponse = splitResponse1.split('<script>')[0]

       $(".replaceAjaxContent").html(splitResponse);
    }).fail(function(jxh,textmsg,errorThrown){
        console.log(textmsg);
        console.log(errorThrown);
    });
}















//Générateur de dés
function randomNumber(range) {
    return Math.round( Math.random() * range );
  }
  
  // --- d4 --- //
  $('#d4Roll').on('click',
  function(){
    var d4Result = Math.floor(Math.random()*4+1);
    document.getElementById('display').innerHTML = d4Result;
  })
  
  // --- d6 --- //
  $('#d6Roll').on('click',
  function(){
    var d6Result = Math.floor(Math.random()*6+1);
    document.getElementById('display').innerHTML = d6Result;
  })
  
  // --- d8 --- //
  $('#d8Roll').on('click',
  function(){
    var d8Result = Math.floor(Math.random()*8+1);
    document.getElementById('display').innerHTML = d8Result;
  })
  
  // --- d10 --- //
  $('#d10Roll').on('click',
  function(){
    var d10Result = Math.floor(Math.random()*10+1);
    document.getElementById('display').innerHTML = d10Result;
  })
  
  // --- d12 --- //
  $('#d12Roll').on('click',
  function (){
    var d12Result = Math.floor(Math.random()*12+1);
    document.getElementById('display').innerHTML = d12Result;
  })
  
  // --- d20 --- //
  $('#d20Roll').on('click',
  function (){
    var d20Result = Math.floor(Math.random()*20+1);
    document.getElementById('display').innerHTML = d20Result;
  })
  
  // --- d100 --- //
  $('#d4Roll').on('click',
  function (){
    var d100Result = Math.floor(Math.random()*100+1);
    document.getElementById('display').innerHTML = d100Result;
  })
  //Générateur de dés
  