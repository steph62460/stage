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
const app = initializeApp(firebaseConfig);

          import { getDatabase, get, ref, set, child, update, remove }
              from "https://www.gstatic.com/firebasejs/9.2.0/firebase-database.js";

          const db = getDatabase();

let equipes = [];






const createArticle = (equipes) => {

    if(equipes.id) {
        const tableau = document.querySelector('tbody')

        const tr = document.createElement('tr');
        const td = document.createElement('td');
        const td2 = document.createElement('td');
        const td3 = document.createElement('td');
    
        td.innerText = equipes.nom;
        td2.innerText = equipes.prenom;
        td3.innerText = equipes.date;
    
        tr.append(td, td2, td3);
        tableau.appendChild(tr)
    
        return tableau;
    };
    if (!equipes.id) {
        const titre = document.querySelector(".section");
        const title = document.createElement('p');
        title.classList.add('title');
        title.innerText = equipes.title;
        const divImg = document.createElement('div');
        divImg.classList.add('team');
        const img = document.createElement('img');
        img.src = equipes.img;
        divImg.appendChild(img);
        titre.append(title, divImg);
        return titre;
    }


    
}
const  startCode = () => {
    const urlSearchParams = new URLSearchParams(window.location.search);
        const params = Object.fromEntries(urlSearchParams.entries());
        console.log(params);

        const dbref = ref(db);
        fetch("https://fcbusnes-3cc17-default-rtdb.firebaseio.com/equipes/" + params.souscat + ".json")
        .then (async response => {
            try {
               equipes = await response.json();
            console.log(equipes);
            const equipeNode = equipes.map((equipe) => {
                return createArticle(equipe) 
            })
            
            } catch (error) {
                console.log(error);
            }
            
        })

        //    get(child(dbref, "equipes/" + params.cat + '/' + params.souscat))
        //             .then((snapshot) => {
        //                 if (snapshot.exists()) {
        //                     equipes = snapshot.val();
        //                     console.log(equipes);
        //                     createArticle(equipes);

        //                 } else {
        //                     alert('No User Found !!!')
        //                 }
        //             })
        //             .catch((error) => {
        //                 console.log('Error :' + error)
        //             })
}

startCode();

const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
   navMenu.classList.toggle("active");

}