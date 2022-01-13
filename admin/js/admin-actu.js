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


let articles = [];

          // REFERENCES
          let idb = document.querySelector("#idB");
          let titleb = document.querySelector("#titleB");
          let imgb = document.querySelector("#imgB");
          let texteb = document.querySelector("#texte1B");
          let scoreb = document.querySelector("#score1B");
          let buteurb = document.querySelector("#buteur1B");
          let texte2b = document.querySelector("#texte2B");
          let score2b = document.querySelector("#score2B");
          let buteur2b = document.querySelector("#buteur2B");
          let prochainAfficheb = document.querySelector("#prochainAfficheB");
          let visibilityb = document.querySelector("#visibilityB")
          let insertBtn = document.querySelector("#insert");
          let selectAllBtn = document.querySelector("#selectAll");
          // FUNCTION INSERT

          function insertData() {
              set(ref(db, "articles/" + (idb.value - 1)), {
                  id: idb.value,
                  title: titleb.value,
                  img: imgb.value,
                  texte1: texteb.value,
                  score1: scoreb.value,
                  buteur1:buteurb.value,
                  texte2: texte2b.value,
                  score2:score2b.value,
                  buteur2:buteur2b.value,
                  prochainAffiche: prochainAfficheb.value,
                  visibility: "true" ? true : false
              })
                  .then(() => {
                      selectAllData()
                      cancel()
                      alert('data inserted');
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
              const users = fetch('https://fcbusnes-3cc17-default-rtdb.firebaseio.com/articles.json')
                  .then(async response => {
                      try {
                          allMyUser = await response.json();
                          articles = allMyUser;
                          displayTable();
                      } catch (e) {
                          console.log(e);
                      }
                  })
          }

          selectAllBtn.addEventListener('click',(event) => {
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
              console.log(articles);
            const tableauNode = articles.map((article) => { 
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
        const btnEdit = document.createElement('button');
        const btnSupp = document.createElement('button');
        const btnUpdate = document.createElement('button')
        
        td.innerText = article.id;
        td2.innerText = article.title;
        td6.innerText = article.visibility
        btnEdit.classList.add('edit');
        btnEdit.innerText = "EDIT"
        btnSupp.classList.add('delete');
        btnSupp.innerText = "DELETE";
        btnUpdate.innerText = "UPDATE";
        btnUpdate.classList.add('update')

        btnEdit.addEventListener('click',(event) => {
            event.preventDefault();
            const dbref = ref(db);
            get(child(dbref, "articles/" + (article.id - 1)))
                .then((snapshot) => {
                    if (snapshot.exists()) {
                        idb.value = snapshot.val().id; 
                        titleb.value = snapshot.val().title;
                        imgb.value = snapshot.val().img;
                        texteb.value = snapshot.val().texte1;
                        scoreb.value = snapshot.val().score1;
                        buteurb.value = snapshot.val().buteur1;
                        texte2b.value = snapshot.val().texte2;
                        score2b.value = snapshot.val().score2;
                        buteur2b.value = snapshot.val().buteur2;
                        prochainAfficheb.value = snapshot.val().prochainAffiche;
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
            update(ref(db, "articles/" + (article.id - 1)), {
                id: idb.value,
                title: titleb.value,
                img: imgb.value,
                texte1: texteb.value,
                score1: scoreb.value,
                buteur1:buteurb.value,
                texte2: texte2b.value,
                score2:score2b.value,
                buteur2:buteur2b.value,
                prochainAffiche: prochainAfficheb.value,
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
            update(ref(db, "articles/" + (article.id -1)), {
                visibility: !article.visibility,
            })
                .then(() => {
                    alert('data deleted');
                    selectAllData();
                    cancel()
                })
                .catch((error) => {
                    alert('Error : ' + error)
                })
        
        })
        
        tr2.append(td, td2, td6, td3, td5, td4)
        td3.appendChild(btnEdit);
        td4.appendChild(btnSupp);
        td5.appendChild(btnUpdate);
          
        return tr2;
        
        }  
