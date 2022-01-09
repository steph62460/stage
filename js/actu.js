let articles = []

const displayArticle = () => {
    const users = fetch('https://fcbusnes-3cc17-default-rtdb.firebaseio.com/articles.json')
        .then(async response => {
            try {
                 articles = await response.json();
                let newArticles = articles.sort((par1, par2) => par2.id - par1.id)
                const articlesNode = newArticles.filter((value) => value.visibility == true).map((article) => {
                return createArticle(article)
                });
    app.append(...articlesNode)
    } catch(e) {
    console.log(e);
    }
        })

}

// const app = document.querySelector('.actu')

// const createArticle = (article) => {
//     const divActu = document.createElement('div');
//     const h2 = document.createElement('h2')
//     const divArticle = document.createElement('div')
//     const imgArticle = document.createElement('img');
//     const actu = document.createElement('p');
//     const lien = document.createElement('a')

//     divActu.classList.add('article');
//     h2.innerText = article.title;

//     divArticle.classList.add('flex');
//     imgArticle.classList.add('photo');
//     imgArticle.src = article.img;
//     actu.classList.add('texte1')
//     actu.innerText = article.texte1;

//     let date = new Date();

//     const divLien = document.createElement('div');
//     divLien.classList.add('divLien')
//     const datePublication = document.createElement('p');
//     datePublication.innerHTML = 'Publié le ' + new Intl.DateTimeFormat('french', { dateStyle: 'long', timeStyle: 'medium' }).format(date); 
//     lien.classList.add('lien');
//     lien.href = `page_actu.php?id=${article.id}&cat=articles`;
//     lien.innerText = "Lire la suite";

//     divLien.append(datePublication, lien)
//     divArticle.append(imgArticle, actu);
//     divActu.append(h2, divArticle, divLien);

//     return divActu;
// }

displayArticle();

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

const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");
    
    hamburger.addEventListener("click", mobileMenu);
    
    function mobileMenu() {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
    }