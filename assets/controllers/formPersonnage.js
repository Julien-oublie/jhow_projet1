const { func } = require("prop-types");

var form = document.querySelector("#personnageForm")

$(document).on('change', '#personnage_valeurPrincipale,#personnage_attributCoeur,#personnage_attributCorps, #personnage_classe, #personnage_origine, #personnage_vocation', function(){
    form.submit();
})

//Changement du nombre de participants
var nombreMax;


$(document).on('change', '#partie_Nombre', function(){
   
    $('#partie_joueurs').css("display", "block");
    nombreMax = $('#partie_Nombre').val()
    
})

$(document).on('change', '#partie_joueurs', function(e){ 
    var current =  $('.chxck').children()
    var currentCheck = current.filter(':checked').length;
    if (currentCheck > nombreMax ) {
        console.log();
        e.target.checked = false
        alert('Vous devez séléctionner '+nombreMax+' joueur(s)')
    }
})
//Changement du nombre de participants


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
  