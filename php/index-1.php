<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>DATABASE</title>
    <link rel="stylesheet" href="/styles/style.css">
</head>
<body>
    <div class="container">
    <div class="titre">
    <h1>CRUD DATABASE</h1>
    <h2>Mini-brief 5 </h2>
    <a class="btn btn-warning" href="create.php" role="button">add new link</a>
    <br>
</div>
<table class="table">
<tr>
    <th>Categorie</th>
    <th>Nom</th>
    <th>Lien</th>
    <th>Description</th>
    <th>Action</th>

</tr>


<?php

try {
    $connexion = new PDO('mysql:host=localhost;dbname=mini-breif5;charset=utf8', 'root', '');
    echo("Connexion établie !");
} catch (Exception $e) {
 
    die('Erreur : ' . $e->getMessage());
}

 $requete = 'SELECT lien.Nom_lien, lien.URL_lien, lien.Description_lien, categorie.Nom_catégorie
 FROM lien 
 LEFT JOIN categorie_lien 
 ON categorie_lien.lien_id = lien.Identifiants_lien
 LEFT JOIN categorie ON categorie.Identifiants_catégorie = categorie_lien.categorie_id';
$requetePreparee = $connexion->prepare($requete);
$requetePreparee->execute();
$resultats = $requetePreparee->fetchAll();

foreach ($resultats as $ligne) {
    echo "<tr>";
        echo "<td>".$ligne ['Nom_catégorie']."</td>";
        echo "<td>".$ligne ['Nom_lien']."</td>";
        echo "<td>".$ligne ['URL_lien']. "</td>";
        echo "<td>".$ligne ['Description_lien']. "</td>";
        echo "<td>
            <a href=\"delete.php\"><i class=\"bi bi-trash3-fill\"></i></a>
            <a href=\"edit.php\"><i class=\"bi bi-pen\"></i></a>";
        echo "</td>";
        
    echo "</tr>" ;
}
?>
</table>
</body>
</html>
