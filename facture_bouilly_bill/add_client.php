<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Document</title>

</head>
<?php
global $bdd;
require_once ".\config/db.php";
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date_naissance']) && isset($_POST['sexe'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $date_naissance = $_POST['date_naissance'];
    echo "<br>1===================================================================";
    var_dump ($_POST['sexe']);
}
if (!empty($nom) && !empty($prenom) && !empty($sexe) && !empty($date_naissance)) {
    $sql = "INSERT INTO clients (nom,prenom,sexe,date_naissance) VALUES (:nom,:prenom,:sexe,:date_naissance)";
    $insert = $bdd->prepare($sql);
    $verif = $insert->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'sexe' => $sexe,
        'date_naissance' => $date_naissance
    ]);
    if ($verif){
        header("location:add_client.php");
        echo "insertion réussie <br>";
    }
    echo "je m'appelle ".$nom." ".$prenom." ".$sexe." ".$date_naissance;
}

echo "<br>===================================================================";
var_dump ($_POST);
?>
<body>
<form action="add_client.php" method="POST">
    <div>
        <h1>Ajouter un client</h1>
    </div>
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom'] ?>">
        <br>
            <?php
            if(isset($_POST['nom']) && empty($_POST['nom']))
            {
                echo "le nom est vide";
            }?>

    </div>
    <div class="form-group">
        <label for="prenom" >Prénom</label>
        <input type="text" class="form-control" name="prenom" id="prenom" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom'] ?>">
        <br>
        <?php
        if(isset($_POST['prenom']) && empty($_POST['prenom']))
        {
            echo "le nom est vide";
        }?>
    </div>
    <!--<//?php foreach ($sexe as $value): ?>-->
    <div class="form-check">
        <input class="form-check-input" type="radio" name="sexe" id="flexRadioDefault1" value="<?= 'H' ?>"><?= 'H' ?>
        <label class="form-check-label" for="flexRadioDefault1">
            Homme
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="sexe" id="flexRadioDefault2" value="<?= 'F' ?>"><?= 'F' ?>
        <label class="form-check-label" for="flexRadioDefault2">
            Femme
        </label>
    </div>
    <?php
            if((isset($_POST['sexe']) && empty($_POST['sexe'])) || !isset($_POST['sexe']))
            {
                echo "le genre est vide";
            }?>

    <!--<//?php endforeach; ?>-->
    <div class="form-group">
        <label for="date_of_birth">Date de naissance</label>
        <input type="date" name="date_naissance" class="form-control" id="date_naissance"  placeholder="Entrer votre date de naissance">
        <?php
            if(isset($_POST['date_naissance']) && empty($_POST['date_naissance']))
            {
                echo "la date de naissance est vide";
            }?>

    </div>
    <button type="submit" name="submit" class="btn btn-success">Submit</button>
</form>
</body>
</html>


