var form = document.querySelector("#personnageForm")

$(document).on('change', '#personnage_attributCoeur,#personnage_attributCorps, #personnage_classe, #personnage_origine, #personnage_vocation', function(){
    form.submit();
})


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