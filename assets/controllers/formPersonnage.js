console.log('test');
var form = document.querySelector("#personnageForm")
$(document).on('change',  '#personnage_class', function(){
    form.submit();
})
$(document).on('change',  '#personnage_origine', function(){
    form.submit();
})