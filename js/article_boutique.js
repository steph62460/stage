let boutique = [];
let panier = [];

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
optgroup.label = article.optgroup;
const option1 = document.createElement('option');
option1.innerText = article.option1;
const option2 = document.createElement('option');
option2.innerText = article.option2;
const option3 = document.createElement('option');
option3.innerText = article.option3;
const option4 = document.createElement('option');
option4.innerText = article.option4;
const option5 = document.createElement('option');
option5.innerText = article.option5;
const optgroup2 = document.createElement('optgroup');
optgroup2.label = article.optgroup2;
const option6 = document.createElement('option');
option6.innerText = article.option6;
const option7 = document.createElement('option');
option7.innerText = article.option7;
const option8 = document.createElement('option');
option8.innerText = article.option8;
const option9 = document.createElement('option');
option9.innerText = article.option9;
const option10 = document.createElement('option');
option10.innerText = article.option10;

const qte = document.createElement('p');
qte.innerText = "Qte: ";
const input = document.createElement('input');
input.type = "number";
input.min = "1";
input.value = article.qte + 1;
const h3 = document.createElement('h3');
h3.innerText = parseFloat(article.price1).toFixed(2) + "€";
if (article.id == 1 || article.id == 4 || article.id == 5 || article.id == 7 || article.id == 8) {
    select.addEventListener('change', () => {
        console.log(select.value);
    
        switch(select.value) {
            case "XXS": 
            case "XS": 
            case "S": 
            case "M": 
            case "L": 
             {
                console.log(select.value);
                h3.innerText = parseFloat(article.price2).toFixed(2) + "€";
                article.price = article.price2
                article.taille = select.value;
                break;
            }
            case "XXL": 
            case "XL": 
            case "S": 
            case "M": 
            case "L":{
                console.log(select.value);
                h3.innerText = parseFloat(article.price1).toFixed(2) + "€";
                article.price = article.price1
                article.taille = select.value;
                break;
            }
            default: {
    
            }
        }
    })
}  else if (article.id == 3) {
    select.addEventListener('change', () => {
        console.log(select.value);
    
        switch(select.value) {
            case "S": 
{
                console.log(select.value);
                h3.innerText = parseFloat(article.price2).toFixed(2) + "€";
                article.price = article.price2
                article.taille = select.value;
                break;
            }
            case "M":{
                console.log(select.value);
                h3.innerText = parseFloat(article.price1).toFixed(2) + "€";
                article.price = article.price1
                article.taille = select.value;
                break;
            }
            default: {
    
            }
        }
    })
} else {
    h3.innerText = parseFloat(article.price1).toFixed(2) + "€";
    article.price = article.price1
    article.taille = select.value;
}

const divButton = document.createElement('div');
divButton.classList.add('divbutton')
const btnDelete = document.createElement('button');
    btnDelete.innerText = "X";
    btnDelete.classList.add('btnDelete');
    btnDelete.style.display = "none";
btnDelete.addEventListener('click', (event) => {
    event.preventDefault();
    removeArticleCart(article)
})

const button = document.createElement('button');
button.classList.add("btn");
button.addEventListener('click', (event) => {
    article.qte = input.value;
    event.preventDefault();
    btnDelete.style.display = "inline-block"
    addArticleCart(article)
})
button.innerText = "Ajoutez au panier";
const h4 = document.createElement('h4');
h4.innerText = "Détail du produit";
const descripArticle = document.createElement('p');
descripArticle.innerText = article.description;


div.appendChild(img);
if (article.id == 3 ) {
select.append(option, optgroup, option1, option2)
}else if(article.id == 6) {
    select.append(option, optgroup, option1, option2, option3, option4, option5)
} else if (article.id == 9 || article.id == 10) {
    select.append(option, optgroup, option1, option2, option3, option4, option5)
} else {
    select.append(option, optgroup, option1, option2, option3, option4, option5, optgroup2, option6, option7, option8, option9, option10)

}
qte.appendChild(input);
divButton.append(button, btnDelete)
divDescrip.append(h2, select, qte, h3, divButton, h4, descripArticle);
app.append(div, divDescrip);

return app;

}

const addArticleCart = (article) => {
    console.log(panier);
    panier.push(article);
    console.log(panier);
    span.classList.add('span')
    span.innerText =panier.length;
    updateArticle(article)
    insertCart(panier);
}
    const removeArticleCart = (article) => {
        let deleteArticle = panier.filter(value => value.id !== article.id);
        panier = deleteArticle;
        insertCart(panier);
        console.log(panier);
        if (panier.length !==0) {
            span.classList.add('span')
        span.innerText =panier.length;
        } else {
            span.classList.remove('span');
            span.innerText = "";
        }
    }


function insertCart(panier) {
    console.log(panier);
    
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

const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");

    hamburger.addEventListener("click", mobileMenu);

    function mobileMenu() {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
    }


    const panier2 = document.querySelector(".nav-item2");
const span = document.createElement('span');
const lien2 = document.createElement('a');
lien2.href = "panier.html";
const img2 = document.createElement("img");
img2.src = "img/cart.png";
img2.classList.add('panier')

lien2.appendChild(img2);
panier2.append(lien2, span);


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

function updateArticle(article) {
    update(ref(db, "boutique/" + (article.id - 1)), {
      qte: article.qte
    })
    .then(() => {
      //   alert('data updated')
    })
    .catch((err) => {
        console.log(err);
    })
}

const  startCode = () => {
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
            console.log(error)
        }
    })

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