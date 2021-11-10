const emailc = document.querySelector("#email");
const passwordc = document.querySelector("#password")
const buttonc = document.querySelector("#connexion");
// const buttoni = document.querySelector("#inscription");

buttonc.addEventListener('click', () => {
    if(emailc.value=="admin" || passwordc.value=="admin"){
		alert ("Login successfully")
             window.location="panier.html";
	}else {
        alert("Please complete the required field!");
        }; 
})
	
// buttoni.addEventListener('click', () => {
//     if(pseudoc.value!=="admin" || passwordc.value!=="admin"){
// 		alert("Please complete the required field!");
// 	}else {
// 			alert ("Login successfully")
//              location.assign("panier.html")
//         }; 
// })

let x = document.getElementById("connexion");
    let y = document.getElementById("inscription");
    let z = document.getElementById("btn");

    function connexion() {
        x.style.left = "-450px";
        y.style.left = "50px";
        z.style.left = "125px";
    }

    function inscription() {
        x.style.left = "50px";
        y.style.left = "-450px";
        z.style.left = "0";
    }

    const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");
    
    hamburger.addEventListener("click", mobileMenu);
    
    function mobileMenu() {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
    }