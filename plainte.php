<?php
global $bdd;
require_once 'bdd.php';
// Recuperer la liste de plaintes



//Delete from table where ID = $id
if(isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['action']) && $_GET['action']=="suppression"){
    //recupération de mon id
    $id = $_GET['id'];
    $sql = "DELETE FROM plaintes WHERE id = :id";
    $query = $bdd->prepare($sql);
    $verif = $query->execute([
            "id" => $id
    ]);
    if($verif){
        header("Location: plainte.php");
    }
}
if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['visible']) && isset($_GET['action']) && $_GET['action']==="gererVisibilite") {
    $visible = $_GET['visible'];
    $id = $_GET['id'];
    $sql = "SELECT * FROM plaintes WHERE id = :id";
    //Modification ds visible
    /*
     *
     */
    $sql = "UPDATE plaintes SET visible = :visible WHERE id = :id";
    $update = $bdd->prepare($sql);
    $verif = $update->execute([
            'visible' => $visible?0:1,
            'id' => $id
    ]);

    if ($verif){
        //echo "insertion réussie <br>";
        header("Location: plainte.php");
    }
    //

}
if(isset($_GET['idselected'])){
   $idselected = $_GET['idselected'];
   var_dump($idselected);
   if(count($idselected)>0){
       $sql = "DELETE FROM plaintes WHERE id = :id";
       $query = $bdd->prepare($sql);
       foreach ($idselected as $id_s) {
           $verif = $query->execute([
                 'id' => $id_s
           ]);

       }
   }
}
$sql = "select * from plaintes";
$query = $bdd->query($sql);
$plaintes = $query->fetchAll();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Document</title>

</head>
<body class="container">
<form action="plainte.php" method="GET">
    <div class="row">
        <div class="col-lg-12">
            <a href="formulairePlaintes.php">Ajouter une plainte</a>
            <button type="submit" class="btn btn-sm btn-danger">Tout Supprimer</button>
            <table class="table table-light">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Sujet</th>
                    <th>Message</th>
                    <th>Date plainte</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($plaintes as $item){ ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="idselected[]" id="" value="<?php echo $item['id'] ?>">
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['nom']; ?></td>
                        <td><?php echo $item['sujet']; ?></td>
                        <td><?php echo $item['message']; ?></td>
                        <td><?php echo $item['date_plainte']; ?></td>
                        <td>
                            <a href="plainte.php?id=<?php echo $item['id']; ?>&visible=<?php echo $item['visible'] ?>&action=gererVisibilite" class="btn btn-warning">Changer Status</a>
                            <?php echo ($item['visible']==1) ?  '<button class="btn btn-success">Visible</button>' :'<button class="btn btn-danger">invisible</button>'; ?></td>
                        <td>
                            <a href="plainte.php?id=<?php echo $item['id']; ?>&action=suppression" class="btn btn-sm btn-danger">Supprimer</a>
                            <a href="edit_plainte.php?id=<?php echo $item['id']; ?>" class="btn btn-sm btn-warning">Modifier</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</form>


</body>
</html>