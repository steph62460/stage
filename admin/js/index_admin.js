const btnActu = document.querySelector('#actu');
const btnBoutique = document.querySelector('#boutique');
const btnEquipe = document.querySelector('#equipes');

btnActu.addEventListener('click', () =>{
    location.assign("admin-actu.html")
})

btnBoutique.addEventListener('click', () =>{
    location.assign("admin-boutique.html")
})

btnEquipe.addEventListener('click', () =>{
    location.assign("admin-equipes.html")
})