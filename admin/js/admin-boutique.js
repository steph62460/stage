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

          const btnReturn = document.querySelector('.button2');

btnReturn.addEventListener('click' , (event) => {
    event.preventDefault();
    location.assign("index_admin.html")
})

let boutique = [];

let idb = document.querySelector("#idB");
let titleb = document.querySelector("#titleB");
let imgb = document.querySelector("#imgB");
let prix1b = document.querySelector("#prix1B");
let prix2b = document.querySelector("#prix2B");
let prixb = document.querySelector("#prixB");
let descriptionb = document.querySelector("#descriptionB");
let visibilityb = document.querySelector("#visibilityB");

let insertBtn = document.querySelector("#insert");
let selectAllBtn = document.querySelector("#selectAll");

function insertData() {
    set(ref(db, "boutique/" + (idb.value - 1)), {
        id: idb.value,
        denomination: titleb.value,
        img: imgb.value,
        adulte: prix1b.value,
        enfant: prix2b.value,
        price: prixb.value,
        description: descriptionb.value,
        visibility: visibilityb.value
    })
        .then(() => {
            alert('data inserted');
            selectAllData()
            cancel()
        })
        .catch((error) => {
            alert('Error : ' + error)
        })
}
insertBtn.addEventListener('click', (event) => {
    event.preventDefault();
    insertData();
})     

let allMyUser = [];
function selectAllData() {
    const users = fetch('https://fcbusnes-3cc17-default-rtdb.firebaseio.com/boutique.json')
        .then(async response => {
            try {
                allMyUser = await response.json();
                boutique = allMyUser;
                displayTable();
            } catch (e) {
                console.log(e);
            }
        })
}

selectAllBtn.addEventListener('click', (event) => {
event.preventDefault()
    selectAllData()
})

// methode reset

function cancel() {
    idb.value = "";
    titleb.value = "";
    imgb.value = "";
    texteb.value = "";
    scoreb.value = "";
    buteurb.value = "";
    texte2b.value = "";
    score2b.value = "";
    buteur2b.value = "";
    prochainAfficheb.value = "";
    visibilityb.value = "";
}

const displayTable = () => {
    console.log(boutique);

  const tableauNode = boutique.map((article) => { 
      return createTable(article)
  });
  app2.innerText = "";
  app2.append(...tableauNode)
}

const app2 = document.querySelector('tbody');

const createTable = (article) => {

const tr2 = document.createElement('tr');
const td = document.createElement('td');
const td2 = document.createElement('td');
const td3 = document.createElement('td');
const td4 = document.createElement('td');
const td5 = document.createElement('td');
const td6 = document.createElement('td');
const td7 = document.createElement('td');
const td8 = document.createElement('td');
const td9 = document.createElement('td');
const img = document.createElement('img');
const btnEdit = document.createElement('button');
const btnSupp = document.createElement('button');
const btnUpdate = document.createElement('button')

tr2.style.textAlign = "center";
td.innerText = article.id;
img.src = "../" + article.img;
img.style.width = "50px";
td2.append(img);
td3.innerText = article.denomination;
td4.innerText = article.description;
td5.innerText = article.price + "€";
td9.innerText = article.visibility
btnEdit.classList.add('edit');
btnEdit.innerText = "EDIT"
btnSupp.classList.add('delete');
btnSupp.innerText = "DELETE";
btnUpdate.innerText = "UPDATE";
btnUpdate.classList.add('update')

btnEdit.addEventListener('click',(event) => {
    event.preventDefault();
    const dbref = ref(db);
    get(child(dbref, "boutique/" + (article.id - 1)))
        .then((snapshot) => {
            if (snapshot.exists()) {
                idb.value = snapshot.val().id; 
                titleb.value = snapshot.val().denomination;
                imgb.value = snapshot.val().img;
                prix1b.value = snapshot.val().adulte;
                prix2b.value = snapshot.val().enfant;
                prixb.value = snapshot.val().price;
                descriptionb.value = snapshot.val().description; 
                visibilityb.value = snapshot.val().visibility;
            } else {
                alert('No User Found !!!')
            }
        })
        .catch((error) => {
            alert('Error :' + error)
        })

})

btnUpdate.addEventListener('click', (event) => {
    event.preventDefault();
    update(ref(db, "boutique/" + (article.id - 1)), {
        id: idb.value,
        denomination: titleb.value,
        img: imgb.value,
        adulte: prix1b.value,
        enfant: prix2b.value,
        price:prixb.value,
        description: descriptionb.value,
        visibility: "true" ? true : false
    })
        .then(() => {
            cancel()
            selectAllData()
            alert('data updated')
        })
        .catch((error) => {
            alert('Error : ' + error)
        })
})

btnSupp.addEventListener("click", (event) => {
    event.preventDefault();
    update(ref(db, "boutique/" + (article.id -1)), {
        visibility: false,
            
    })
        .then(() => {
            alert('data deleted')
             selectAllData()
             cancel()
        })
        .catch((error) => {
            alert('Error : ' + error)
        })

})

tr2.append(td, td2, td3, td4, td5,td9, td6, td8, td7)
td6.appendChild(btnEdit);
td7.appendChild(btnSupp);
td8.appendChild(btnUpdate);
  
return tr2;

}