let articles = [];


const app = document.querySelector('.articles')

const createArticle = (article) => {
const div2 = document.createElement('div')
const titre = document.createElement('h2');
const div = document.createElement('div');
const img = document.createElement('img');
const texte1 = document.createElement('p');
const score1 = document.createElement('p');
const buteur1 = document.createElement('p');
const texte2 = document.createElement('p');
const score2 = document.createElement('p');
const buteur2 = document.createElement('p');
const prochainAffiche = document.createElement('p');
prochainAffiche.style.marginBottom = "2%";

titre.innerText = article.title;
div.classList.add('article');
img.src = article.img;
img.classList.add('photo')
texte1.innerText = article.texte1;
score1.innerText = article.score1;
buteur1.innerText = article.buteur1;
texte2.innerText = article.texte2;
score2.innerText = article.score2;
buteur2.innerText = article.buteur2;
prochainAffiche.innerText = article.prochainAffiche;

div2.append(titre, div);
div.append(img, texte1, score1, buteur1, texte2, score2, buteur2, prochainAffiche);
app.appendChild(div2);
return div2;
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

window.onload = () => {
    const urlSearchParams = new URLSearchParams(window.location.search);
        const params = Object.fromEntries(urlSearchParams.entries());
        console.log(params);

        const dbref = ref(db);

                get(child(dbref, params.cat + '/' + (params.id-1)))
                    .then((snapshot) => {
                        if (snapshot.exists()) {
                            articles = snapshot.val();
                            console.log(articles);
                            createArticle(articles);

                        } else {
                            alert('No User Found !!!')
                        }
                    })
                    .catch((error) => {
                        alert('Error :' + error)
                    })
}
