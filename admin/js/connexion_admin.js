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

let admin = [];
function getAllAdmin () {
  fetch('https://fcbusnes-3cc17-default-rtdb.firebaseio.com/users.json')
  .then(async response =>{
    try {
      admin = await response.json()
    } catch (error) {
      console.log(error);
    }
  })
}

const connexion = document.querySelector('form');
const ul = document.querySelector('ul');

const li = document.createElement('li');

let valuePseudo, valuePassword;
let compteur = 0;
let refus = 0;

connexion.addEventListener('submit', (event) =>{
  event.preventDefault();
  li.innerText = "";
  valuePseudo = document.querySelector("#pseudoC");
  valuePassword = document.querySelector("#passwordC");

  let adminFirebase = admin.filter(value => value.user == valuePseudo.value && value.password == valuePassword.value);
console.log(adminFirebase);

if(adminFirebase.length > 0 ) {
  location.assign('index_admin.html')
} else {
  li.innerText = 'Pseudo et/ou Mot de passe incorrects';
  ul.appendChild(li);
  valuePseudo.value = "";
  valuePassword.value = "";
  compteur++;
  if(compteur == 3 ){
    if (refus ==1) {
      li.innerText = "Accès bloqué";
      valuePseudo.value = "";
      valuePassword.value = "";
      valuePseudo.disabled = true;
      valuePassword.disabled = true;
    } else {
      li.innerText = "Nombres maximum d'eesais atteint, veuillez patienter 5 minutes";
      valuePseudo.value = "";
      valuePassword.value = "";
      valuePseudo.disabled = true;
      valuePassword.disabled = true;
      refus++;
      setTimeout(() => {
        valuePseudo.disabled = false;
        valuePassword.disabled = false;
        compteur = 0
      }, 5000);
    }
  }
}

})

getAllAdmin();