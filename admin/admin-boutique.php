<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin-boutique.css">
    <title>FC Busnes - Page Admin Boutique</title>
</head>
<body>
    <div>
        <div class="admin">
            <h1>Page Admin Boutique</h1>
            <label for="">Id:</label><input type="text" id="idB">
            <label for="">Title:</label><input type="text" id="titleB">
            <label for="">Image:</label><input type="text" id="imgB">
            <label for="">Prix 1: </label><input type="text" id="prix1B" placeholder="mettre prix adulte: ou prix taille + taille: et le signe €">
            <label for="">Prix 2: </label><input type="text" id="prix2B" placeholder="mettre prix adulte: ou prix taille + taille: et le signe €">
            <label for="">Prix: </label><input type="text" id="prixB" placeholder="mettre prix sans le signe € ni aucun texte">
            <label for="">Description:</label><input type="text" id="descriptionB">
            <label for="">Visibilité:</label><input type="text" id="visibilityB" placeholder=" mettre true pour afficher"> 
            <div class="button">
                <button id="insert">INSERT</button>
                <button id="selectAll">SELECT ALL</button>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Denomination</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Visibilité</th>
                    <th>Editer</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div>
            <button class="button2">Retour à l'accueil</button>
        </div>
    </div>
</body>
<script src="js/admin-boutique.js" type="module"></script>
</html>