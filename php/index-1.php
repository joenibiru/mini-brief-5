<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATABASE</title>
</head>
<body>
    <h1>CRUD DATABASE</h1>
<?php

try
{
    // On se connecte à MySQL
    $connexion = new PDO('mysql:host=localhost;
                            dbname=mini-breif5;
                            charset=utf8', 
                            'root', 
                            '');

    echo("connexion etablie !");
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table 

    $requete='SELECT * FROM categorie';
    $requete_preparee = $connexion -> prepare ($requete);
    $requete_preparee -> execute();
    $resultat = $requete_preparee -> fetchAll();

    foreach($resultat as $resultat){



?>

<p><?php echo $resultat ['Identifiants_catégorie']; ?><?php echo $resultat ['Nom_catégorie']; ?></p>

<?php


}
?>
</body>
</html>
