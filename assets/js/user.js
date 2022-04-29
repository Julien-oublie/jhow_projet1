const btnPersonnage = document.getElementById('persoShow');
const btnPartie = document.getElementById('partieShow');
const btnAmie = document.getElementById('amieShow');


const divPartie = document.getElementById('partie')
const divPerso = document.getElementById('personnage')
const divAmie = document.getElementById('amie')



btnPersonnage.addEventListener('click',function(){
    
    divPerso.style.display = 'flex'
    divPartie.style.display = 'none'
    divAmie.style.display = 'none'

    console.log('heooo')

})

btnPartie.addEventListener('click',function(){
    
    divPartie.style.display = 'flex'
    divPerso.style.display = 'none'
    divAmie.style.display = 'none'
})

btnAmie.addEventListener('click',function(){
    
    divAmie.style.display = 'flex'
    divPerso.style.display = 'none'
    divPartie.style.display = 'none'
})