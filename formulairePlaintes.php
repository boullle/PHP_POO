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
require_once "bdd.php";
//recuperation des infos
//nom , email ,sujet, message4

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['sujet']) && isset($_POST['message'])) {
    $nom =$_POST['name'];
    $email=$_POST['email'];
    $sujet=$_POST['sujet'];
    $message=$_POST['message'];

    if (!empty($nom) && !empty($email) && !empty($sujet) && !empty($message)) {
        $sql = "INSERT INTO plaintes (nom,sujet,message,date_plainte) VALUES (:nom,:sujet,:message,:date_plainte)";
        $insert = $bdd->prepare($sql);
        $verif = $insert->execute([
                'nom' => $nom,
                'sujet' => $sujet,
                'message' => $message,
                'date_plainte' => date('Y-m-d'),
        ]);
        if ($verif){
            //echo "insertion réussie <br>";
            header("Location: plainte.php");
        }
        echo "je m'appelle ".$nom." mon email est ".$email.". Ma plainte porte sur ".$sujet."<br> Contenu: <br> ".$message;
    }

}


?>

<body>


    <a href="plainte.php"><button>Consulter les plaintes</button></a>
    <h1>Ajouter une plainte</h1>
    <form class="form-horizontal" action="formulairePlaintes.php" method="POST">
        <div class="form-group">
            <label for="usr">Name:</label>
            <input type="text" class="form-control" name="name" id="usr" value="<?php if(isset($_POST['name'])) echo $_POST['name'] ?>">
            <br>
            <?php
            if(isset($_POST['name']) && empty($_POST['name']))
            {
                echo "le nom est vide";
            }?>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>">
                <?php
                if(isset($_POST['email']) && empty($_POST['email']))
                {
                    echo "l'email est vide";
                }?>
            </div>
        </div>
        <div class="form-group">
            <label for="usr">Sujet:</label>
            <input type="text" class="form-control" name="sujet" id="usr" value="<?php if(isset($_POST['sujet'])) echo $_POST['sujet'] ?>">
            <?php
            if(isset($_POST['sujet']) && empty($_POST['sujet']))
            {
                echo "le sujet est vide";
            }?>
        </div>

        <div class="form-group">
            <label for="message">Message:</label>
            <textarea name="message" class="form-control" rows="5" id="comment" value="<?php if(isset($_POST['message'])) echo $_POST['message'] ?>"></textarea>
            <?php
            if(isset($_POST['message']) && empty($_POST['message']))
            {
                echo "le message est vide";
            }?>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="submit" class="btn btn-primary" >Valider</button>
            </div>
        </div>
    </form>

</body>

</html>
