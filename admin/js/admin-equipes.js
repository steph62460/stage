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

 let equipes = [];   
 
    // REFERENCES
          let menub = document.querySelector("#menuB");
          let idb = document.querySelector("#idB");
          let nomb = document.querySelector("#nomB");
          let prenomb = document.querySelector("#prenomB");
          let dateb = document.querySelector("#dateB");
          let visibilityb = document.querySelector("#visibilityB")

          let insertBtn = document.querySelector("#insert");
          let selectAllBtn = document.querySelector("#selectAll");
          // FUNCTION INSERT

          function insertData() {
              set(ref(db, ("equipes/" + menub.value + "/") + idb.value), {
                  id: idb.value,
                  nom: nomb.value,
                  prenom: prenomb.value,
                  date: dateb.value,
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

          // FUNCTION SELECTALL
          let allMyUser = [];
          function selectAllData() {
            const value = menub.value;
              const users = fetch('https://fcbusnes-3cc17-default-rtdb.firebaseio.com/equipes/' + value + '.json')
                  .then(async response => {
                      try {
                          allMyUser = await response.json();
                          equipes = allMyUser;
                          console.log(equipes);
                          displayTable();
                      } catch (e) {
                          console.log(e);
                      }
                  })
          }

          selectAllBtn.addEventListener('click', (event) => {
            event.preventDefault();
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
            console.log(equipes);
            const tableauNode = equipes.map((article) => { 
                return createTable(article)
            });
            app2.innerText = "";
            app2.append(...tableauNode)
        }
        
        const app2 = document.querySelector('tbody');
        
        const createTable = (article) => {
            if (article.id) {
        const tr2 = document.createElement('tr');
        const td = document.createElement('td');
        const td2 = document.createElement('td');
        const td3 = document.createElement('td');
        const td4 = document.createElement('td');
        const td5 = document.createElement('td');
        const td6 = document.createElement('td');
        const td7 = document.createElement('td');
        const btnEdit = document.createElement('button');
        const btnSupp = document.createElement('button');
        const btnUpdate = document.createElement('button')
        
        td.innerText = article.id;
        td2.innerText = article.nom;
        td3.innerText = article.prenom;
        td4.innerText = article.date;
        btnEdit.classList.add('edit');
        btnEdit.innerText = "EDIT"
        btnSupp.classList.add('delete');
        btnSupp.innerText = "DELETE";
        btnUpdate.innerText = "UPDATE";
        btnUpdate.classList.add('update')

        btnEdit.addEventListener('click',(event) => {
            event.preventDefault();
            const dbref = ref(db);
            get(child(dbref,  ("equipes/" + menub.value + "/") + article.id))
                .then((snapshot) => {
                    if (snapshot.exists()) {
                        idb.value = snapshot.val().id; 
                        nomb.value = snapshot.val().nom;
                        prenomb.value = snapshot.val().prenom;
                        dateb.value = snapshot.val().date;
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
            update(ref(db, ("equipes/" + menub.value + "/") + (article.id)), {
                id: idb.value,
                  nom: nomb.value,
                  prenom: prenomb.value,
                  date: dateb.value,
                visibility: "true" ? true : false
            })
                .then(() => {
                    alert('data updated')
                    selectAllData()
                    cancel()
                })
                .catch((error) => {
                    alert('Error : ' + error)
                })
        })

        btnSupp.addEventListener("click", (event) => {
            event.preventDefault();
            update(ref(db, ("equipes/" + menub.value + "/") + article.id), {
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
        
        tr2.append(td, td2, td3, td4, td5, td6, td7)
        td5.appendChild(btnEdit);
        td7.appendChild(btnSupp);
        td6.appendChild(btnUpdate);
          
        return tr2;     

    } else {
        return ""
    }
}