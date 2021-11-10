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


let articles = []

const displayArticle = () => {
    const users = fetch('https://fcbusnes-3cc17-default-rtdb.firebaseio.com/articles.json')
        .then(async response => {
            try {
                const articles = await response.json();
                let newArticles = articles.sort((par1, par2) => par2.id - par1.id)
                const articlesNode = newArticles.filter((value) => value.visibility === true).map((article) => {
                return createArticle(article)
                });
    divActu.append(...articlesNode)
    } catch(e) {
    console.log(e);
    }
        })

}

const divActu = document.querySelector(".bactu");

const createArticle = (article) => {
const div = document.createElement('div');
const divActu = document.createElement('div')
const lien = document.createElement('a');

divActu.classList.add("bactuinfo");
lien.href= `page_actu.html?id=${article.id}&cat=articles`;
lien.innerText =article.title;
lien.style.color = "black";

div.append(divActu);
divActu.appendChild(lien);

return div;
}
displayArticle();

const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");
    
    hamburger.addEventListener("click", mobileMenu);
    
    function mobileMenu() {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
    }