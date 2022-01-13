// let equipes = []
// let equipes2 = []

// const displayEquipes = () => {
//     const users = fetch('https://fcbusnes-3cc17-default-rtdb.firebaseio.com/equipes.json')
//         .then(async response => {
//             try {
//                 const equipes = await response.json();
//                 console.log(Object.entries(equipes));
//                 console.log(Object.keys(equipes));
//                 let tabEquipe = Object.entries(equipes);
//                 let tabEquipe2 = Object.keys(equipes);
//                 for (let i=0; i < tabEquipe.length; i++) {
//                     console.log(tabEquipe[i][1][0]);
//                     equipes2.push(tabEquipe[i][1][0])
//                     console.log(equipes2);
//                 }
//                 for (let i=0; i < tabEquipe2.length; i++) {
//                     console.log(tabEquipe2[i]);
//                     equipes2[i].type = tabEquipe2[i]
//                     // equipes2.push(tabEquipe[i][1][0])
//                     console.log(equipes2);
//                 }
//                 let newEquipes = equipes2.sort((par1, par2) => par1.cle - par2.cle)
//                 const equipesNode = newEquipes.map((equipe) => {
//                 return createEquipes(equipe)
//                 });
//     team.append(...equipesNode)
//     } catch(e) {
//     console.log(e);
//     }
//         })

// }

// const team = document.querySelector('.boutique')

// const createEquipes = (equipe) => {

//     const div = document.createElement('div');
//     div.classList.add('article');
//     const title = document.createElement('h3');
//     title.innerText = equipe.title;
//     const lienEquipe = document.createElement('a');
//     lienEquipe.href = `equipe-liste.php?cat=equipes&souscat=${equipe.type}`;
//     const img = document.createElement('img');
//     img.src = equipe.img;

//     lienEquipe.appendChild(img);
//     div.append(title, lienEquipe)

//     return div
// }

// displayEquipes();

const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");

    hamburger.addEventListener("click", mobileMenu);

    function mobileMenu() {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
    }

// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.2.0/firebase-app.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyCbnx7f_01DwYF4uKf3WnqdfGetiiuKJWo",
  authDomain: "fcbusnes-3cc17.firebaseapp.com",
  databaseURL: "https://fcbusnes-3cc17-default-rtdb.firebaseio.com",
  projectId: "fcbusnes-3cc17",
  storageBucket: "fcbusnes-3cc17.appspot.com",
  messagingSenderId: "22121115666",
  appId: "1:22121115666:web:c24367e2875482fac9e8cb"
};

// Initialize Firebase
const app2 = initializeApp(firebaseConfig);

import { getDatabase, get, ref, set, child, update, remove}
from "https://www.gstatic.com/firebasejs/9.2.0/firebase-database.js";

const db = getDatabase();
