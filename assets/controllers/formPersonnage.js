
let nom = $('#personnage_nom')
$(document).on('change', '#personnage_class', function(){
    console.log('salut');
    let field = $(this)
    let form = field.closest('form')
    let data = {}
    data['class'] = field.val()
    data['nom'] = nom.val()

    $.ajax({
        type: "POST",
        url: "/personnage/new",
        data: data,
        success: function (data, dataType) {
            console.log(data);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('Error : ' + errorThrown);
        }
    });

  
    

})