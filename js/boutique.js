let boutique = [];

let panier = [];

const art = document.querySelector('.boutique');

const displayArticle = () => {
     fetch('https://fcbusnes-3cc17-default-rtdb.firebaseio.com/boutique.json')
        .then(async response => {
            try {
                 boutique = await response.json();
                const articlesNode = boutique.filter((value) => value.visibility == true).map((art) => {
                return createArticleElement(art);
            });
        art.append(...articlesNode);
} catch(e) {
    console.log(e);
    }
        })
fetch('https://fcbusnes-3cc17-default-rtdb.firebaseio.com/panier.json')
    .then(async response => {
        try {
            panier = await response.json();
            panier == undefined ? panier = [] : panier = panier.panier;
            console.log(panier);

            if (panier.length !== 0) {
            span.innerText = panier.length; 
            span.classList.add('span')
        }
        } catch (error) {
            console.log(error);
        }
})
}


const createArticleElement = (art) => {

const div = document.createElement('div');
div.classList.add('article');
const a = document.createElement('a');
a.href = `article_boutique.php?id=${art.id}&cat=boutique`;
const img = document.createElement('img');
img.src = art.img;
const title = document.createElement('h3');
title.innerText = art.denomination;
const paragr2 = document.createElement('p');
paragr2.innerText = art.adulte;
const paragr3 = document.createElement('p');
paragr3.innerText = art.enfant;

a.appendChild(img);
// div2.append(btnAjout, btnSupp)
div.append(a , title, paragr2, paragr3);
return div;

}

// // Fonction ajout panier a firebase

function insertCart(panier) {
    set(ref(db, "panier/"), {
        panier
    })
    .then(() => {
        // alert('Panier modified')
    })
    .catch((error) => {
        console.log(error);
    })
}

const panier2 = document.querySelector(".nav-item2");
const span = document.createElement('span');
const lien2 = document.createElement('a');
lien2.href = "panier.php";
const img2 = document.createElement("img");
img2.src = "img/cart.png";
img2.classList.add('panier')
lien2.appendChild(img2);
panier2.append(lien2, span);




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


displayArticle();