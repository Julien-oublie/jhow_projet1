
console.log('test');
console.log(window.location.origin)
var classe = document.getElementById('personnage_class')
var link  = document.getElementById('request')
classe.addEventListener("change", function(e){
    console.log(link.getAttribute('href'),classe.value)
    fetch(link.getAttribute('href'), {
        method: "POST",
        headers: {
            "X-Requested-With": "XMLHttpRequest",
            "Content-Type": "application/json"
        },
        body: JSON.stringify({"_token": this.dataset.token})
    }).then(
        // On récupère la réponse en JSON
        response => response.json()
    ).then(data => {
        if(data.success){
            console.log('success')
        }
        else{
            alert(data.error)
        }
    }).catch(e => alert(e))
    //console.log(data)
    

})
