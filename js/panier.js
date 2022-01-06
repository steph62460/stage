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
lien2.href = "panier.php";
const img2 = document.createElement("img");
img2.src = "img/cart.png";
img2.classList.add('panier');

const total = document.querySelector('.spTot')

lien2.appendChild(img2);
panier2.append(lien2, span);


const divButton = document.querySelector('.button');
const abutton = document.createElement('a');
const buttonValider = document.createElement('button');
buttonValider.classList.add('buttonValider')
buttonValider.innerText = "Payer maintenant";
abutton.href = "#"

abutton.append(buttonValider);
divButton.append(abutton);

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
           pricePanier(panier);
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

let total2;
let affichage;
let totalArticleOne;

const createPanierElement = (article, index) => {
    priceArticle(article)
    const divArticle = document.createElement('div');
    divArticle.classList.add('article');
    const img = document.createElement('img');
    img.src = article.img;
    const h3 = document.createElement('h3');
    h3.innerText = article.denomination;
    const price = document.createElement('p');
    price.innerText = parseFloat(article.price).toFixed(2) + "€";
    const divTaille = document.createElement('div');
    const labelTaille = document.createElement('label');
    labelTaille.innerText = "Taille : ";
    const inputTaille = document.createElement('input');
    inputTaille.value = article.taille;
    const divQte = document.createElement('div');
    const label = document.createElement('label');
    label.innerText = "Qte : ";
    const inputQte = document.createElement('input');
    inputQte.type = "number";
    inputQte.min = "1";
    inputQte.value = Number(article.qte);
    const totalArticle = document.createElement('p');
    totalArticle.innerText = parseFloat(totalArticleOne).toFixed(2) + "€";

    totalArticle.classList.add('test');
    affichage = document.querySelector('.test')
    inputQte.addEventListener('change', () => {
        article.qte = inputQte.value
        pricePanier(panier);
        priceArticle(article)
        totalArticle.innerText = parseFloat(totalArticleOne).toFixed(2) + "€";
    })

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
    divTaille.append(labelTaille, inputTaille)
    divArticle.append(img, h3, price, divTaille, divQte, btnDelete, totalArticle);

    return divArticle;
}


const pricePanier = (panier) => {
    const totalPanier = panier.reduce((acc, value) => {
        acc +=value.price1 * Number(value.qte);
        return acc;
    }, 0);
    total2 = parseFloat(totalPanier).toFixed(2);
    total.innerText = total2 + "€";
}

const priceArticle = (article) => {
    const total3 = article.price * Number(article.qte)
    totalArticleOne = parseFloat(total3).toFixed(2);
}


displayPanier();