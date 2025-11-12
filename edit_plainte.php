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

if (isset($_POST['nom']) && isset($_POST['sujet']) && isset($_POST['message']) && isset($_POST['id'])) {
    $nom = $_POST['nom'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];
    $id = $_POST['id'];
// le cas ou tout est bon modifier la plainte
    if (!empty($nom) && !empty($sujet) && !empty($message) && !empty($_POST['id'])) {

        //Modification d'une plainte
        /*
         * UPDATE Tables SET nom:nom, sujet:sujet, message:message where id= : id
         */
        $sql = "UPDATE plaintes SET nom = :nom, sujet = :sujet, message = :message WHERE id = :id";
        $update = $bdd->prepare($sql);
        $verif = $update->execute([
            'nom' => $nom,
            'sujet' => $sujet,
            'message' => $message,
            'id' => $id
        ]);

        if ($verif){
            //echo "insertion réussie <br>";
            header("Location: plainte.php");
        }
       // echo "je m'appelle ".$nom." mon email est ".$email.". Ma plainte porte sur ".$sujet."<br> Contenu: <br> ".$message;
    }

}
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM plaintes WHERE id = :id";
    $query = $bdd->prepare($sql);
    $plainte = $query->execute([
        'id' => $id
    ]);

    $plainte = $query->fetch();
}

?>

<body>

<a href="plainte.php"><button>Consulter les plaintes</button></a>
<h1>Modifier une plainte</h1>
<form class="form-horizontal" action="edit_plainte.php" method="POST">
    <!-- envoyer l'id en cachette -->
    <input type="hidden" name="id" value="<?php echo $plainte['id']; ?>">
    <div class="form-group">
        <label for="usr">Name:</label>
        <input type="text" class="form-control" name="nom" id="usr" value="<?php if(isset($plainte['nom'])) echo $plainte['nom'] ?>">
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
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="<?php if(isset($_plainte['email'])) echo $_plainte['email'] ?>">
            <?php
            if(isset($_POST['email']) && empty($_POST['email']))
            {
                echo "l'email est vide";
            }?>
        </div>
    </div>
    <div class="form-group">
        <label for="usr">Sujet:</label>
        <input type="text" class="form-control" name="sujet" id="usr" value="<?php if(isset($plainte['sujet'])) echo $plainte['sujet'] ?>">
        <?php
        if(isset($_POST['sujet']) && empty($_POST['sujet']))
        {
            echo "le sujet est vide";
        }?>
    </div>

    <div class="form-group">
        <label for="message">Message:</label>
        <textarea name="message" class="form-control" rows="5" id="comment" ><?php if(isset($plainte['message'])) echo $plainte['message'] ?></textarea>
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
