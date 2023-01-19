<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "mini-breif5";
$sql = "mysql";

$connexion = new PDO('mysql:host=localhost;dbname=mini-breif5;charset=utf8', 'root', '');


$Nom = "";
$Lien = "";
$Description = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    
    $Nom = $_POST["Nom"];
    $Lien = $_POST["Lien"];
    $Description = $_POST["Description"];

    do {
        if ( empty($Nom) || empty($Lien ) || empty($Description)) {
            $errorMessage = 'tous les champs doivent être remplis';
            break;
        }

        $sql = "INSERT INTO lien ( Nom_lien, URL_lien, Description_lien) " .
                "Values ( '$Nom', '$Lien', '$Description')";
        $result = $connexion->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query:" . $connexion->error;
            break;
        }
            

        $Nom = "";
        $Lien = "";
        $Description = "";

        $successMessage = "ajouts effectuer";

        header("location: /htdocs/index-1.php");
        exit;

    } while (false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h2>Ajouts</h2>

        <?php
        if ( !empty($errorMessage)) {
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                 <strong>$errorMessage</strong>
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'><button>
            </div>
            ";
        }
        ?>
        <form  method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nom</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Nom" value="<?php echo $Nom; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Lien</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Lien" value="<?php echo $Lien; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="Description" value="<?php echo $Description; ?>">
                    </div>
            </div>

            <?php
              if ( !empty($successMessage)) {
                echo"
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'><button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Soumettre</button>
                </div>
                <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="index-1.php" role="button">Annuler</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>