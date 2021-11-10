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

function insertCart(panier) {
    set(ref(db, "panier/"), {
        panier
    })
    .then(() => {
        // alert('Panier modified')
        displayPanier();
    })
    .catch((error) => {
        console.log(error);
    })
}

const art = document.querySelector('.articles-container');
const panier2 = document.querySelector(".nav-item2");
const span = document.createElement('span');
const lien2 = document.createElement('a');
lien2.href = "panier.html";
const img2 = document.createElement("img");
img2.src = "img/cart.png";
img2.classList.add('panier');

const total = document.querySelector('.spTot')

lien2.appendChild(img2);
panier2.append(lien2, span);


let panier = [];

const displayPanier = () => {
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
       const panierNode = panier.map((article, index) => {
           return createPanierElement(article, index)
       })
       pricePanier(panier);
       art.innerHTML = "";
       art.append(...panierNode);
       } catch (error) {
           console.log(error);
       }
})
}

const createPanierElement = (article, index) => {
    const divArticle = document.createElement('div');
    divArticle.classList.add('article');
    const img = document.createElement('img');
    img.src = article.img;
    const h3 = document.createElement('h3');
    h3.innerText = article.denomination;
    const price = document.createElement('p');
    price.innerText = article.price + "€";
    const divQte = document.createElement('div');
    const label = document.createElement('label');
    label.innerText = "Qte : ";
    const inputQte = document.createElement('input');
    inputQte.type = "number";
    inputQte.min = "1";
    inputQte.value = "1";
    const btnDelete = document.createElement('button');
    btnDelete.innerText = "X";
    btnDelete.classList.add('btnDelete');
    btnDelete.addEventListener('click', () => {
        panier.splice(index, 1);
        console.log(index);
        insertCart(panier);
        if (panier.length !== 0) {
            span.innerText = panier.length; 
            span.classList.add('span')
        } else {
            span.innerText = "";
            span.classList.remove('span')
        }
    })

    divQte.append(label, inputQte);
    divArticle.append(img, h3, price, divQte, btnDelete);

    return divArticle;
}

const pricePanier = (panier) => {
    const totalPanier = panier.reduce((acc, value) => {
        acc +=value.price;
        return acc;
    }, 0);
    total.innerText = totalPanier;
}


displayPanier();