console.log('test');
var form = document.querySelector("#personnageForm")

$(document).on('change', '#personnage_attributCorps, #personnage_class, #personnage_origine, #personnage_vocation', function(){
    form.submit();
})

