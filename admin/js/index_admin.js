const btnActu = document.querySelector('#actu');
const btnBoutique = document.querySelector('#boutique');
const btnEquipe = document.querySelector('#equipes');

btnActu.addEventListener('click', () =>{
    location.assign("admin-actu.php")
})

btnBoutique.addEventListener('click', () =>{
    location.assign("admin-boutique.php")
})

btnEquipe.addEventListener('click', () =>{
    location.assign("admin-equipes.php")
})