let boutique = {};

const app = document.querySelector('.row')

const createArticle = (article) => {
const div = document.createElement('div');
div.classList.add('produit');
const img = document.createElement('img');
img.src = article.img;
const divDescrip = document.createElement('div');
divDescrip.classList.add('produit2');
const h2 = document.createElement('h2');
h2.innerText = article.denomination;
const select = document.createElement('select');
const option = document.createElement('option');
option.innerText = "Choix Taille";
const optgroup = document.createElement('optgroup');
optgroup.label = "Enfant";
const option1 = document.createElement('option');
option1.innerText = "XXS";
const option2 = document.createElement('option');
option2.innerText = "XS";
const option3 = document.createElement('option');
option3.innerText = "S";
const option4 = document.createElement('option');
option4.innerText = "M";
const option5 = document.createElement('option');
option5.innerText = "L";
const optgroup2 = document.createElement('optgroup');
optgroup2.label = "Adulte";
const option6 = document.createElement('option');
option6.innerText = "S";
const option7 = document.createElement('option');
option7.innerText = "M";
const option8 = document.createElement('option');
option8.innerText = "L";
const option9 = document.createElement('option');
option9.innerText = "XL";
const option10 = document.createElement('option');
option10.innerText = "XXL";

const qte = document.createElement('p');
qte.innerText = "Qte: ";
const input = document.createElement('input');
input.type = "number";
input.min = "1";
input.value = "1";
const h3 = document.createElement('h3');
h3.innerText = article.price + "€";
const button = document.createElement('button');
button.classList.add("btn");
button.innerText = "Ajoutez au panier";
const h4 = document.createElement('h4');
h4.innerText = "Détail du produit";
const descripArticle = document.createElement('p');
descripArticle.innerText = article.description;

div.appendChild(img);
select.append(option, optgroup, option1, option2, option3, option4, option5, optgroup2, option6, option7, option8, option9, option10)
qte.appendChild(input);
divDescrip.append(h2, select, qte, h3, button, h4, descripArticle);
app.append(div, divDescrip);

return app;

}


const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");

    hamburger.addEventListener("click", mobileMenu);

    function mobileMenu() {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
    }


    
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.3.0/firebase-app.js";
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
from "https://www.gstatic.com/firebasejs/9.3.0/firebase-database.js";

const db = getDatabase();

const  startCode = () => {
        const urlSearchParams = new URLSearchParams(window.location.search);
            const params = Object.fromEntries(urlSearchParams.entries());
            console.log(params);
    
            const dbref = ref(db);
    
               get(child(dbref, params.cat + '/' + (params.id-1)))
                        .then((snapshot) => {
                            if (snapshot.exists()) {
                                boutique = snapshot.val();
                                console.log(boutique);
                                createArticle(boutique);
    
                            } else {
                                alert('No User Found !!!')
                            }
                        })
                        .catch((error) => {
                            console.log('Error :' + error)
                        })
    }

    startCode();