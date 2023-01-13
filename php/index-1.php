<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    <title>DATABASE</title>
</head>
<body>
    <header class=titre>
    <h1>CRUD DATABASE</h1>
    <h2>Mini brief 5 </h2>
    </header>


<table>
<tr>
    <th>Categorie</th>
    <th>Nom</th>
    <th>Lien</th>
    <th>Description</th>
</tr>


<?php

try {
    // On se connecte à MySQL
    $connexion = new PDO('mysql:host=localhost;dbname=mini-breif5;charset=utf8', 'root', '');
    echo("Connexion établie !");
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table 
 $requete = 'SELECT lien.Nom_lien, lien.URL_lien, lien.Description_lien, categorie.Nom_catégorie
 FROM lien 
 JOIN categorie_lien 
 ON categorie_lien.lien_id = lien.Identifiants_lien
 JOIN categorie ON categorie.Identifiants_catégorie = categorie_lien.categorie_id';
$requetePreparee = $connexion->prepare($requete);
$requetePreparee->execute();
$resultats = $requetePreparee->fetchAll();

foreach ($resultats as $ligne) {
    echo "<tr>";
        echo "<td>".$ligne ['Nom_catégorie']."</td>";
        echo "<td>".$ligne ['Nom_lien']."</td>";
        echo "<td>".$ligne ['URL_lien']. "</td>";
        echo "<td>".$ligne ['Description_lien']. "</td>";
        
    echo "<tr>";
}
?>
</table>
</body>
</html>
