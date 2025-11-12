<?php
global $bdd;
require_once ".\config/db.php";


$sql = "select * from clients";
$query = $bdd->query($sql);
$clients = $query->fetchAll();
echo "test1<br>";
var_dump($_GET);
$id = $_GET['id_clients_selected'] ?? $_POST['id_clients_selected'] ?? null;

if ($id !== null && is_numeric($id)) {
    echo "test2<br>";
    var_dump($_POST);

    // Récupération du client
    $sql = "SELECT nom, prenom FROM clients WHERE id_client = :id";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(['id' => $id]);
    $client = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "test6<br>";
    var_dump($client);
    echo "<br>" . $id;

    // Traitement du formulaire
    if (
            isset($_POST['montant'], $_POST['produit'], $_POST['quantite']) &&
            !empty($_POST['montant']) &&
            !empty($_POST['produit']) &&
            !empty($_POST['quantite'])
    ) {
        echo "test3<br>";
        $montant = $_POST['montant'];
        $produit = $_POST['produit'];
        $quantite = $_POST['quantite'];

        $sql = 'INSERT INTO factures (montant, produit, quantite, id_client) VALUES (:montant, :produit, :quantite, :id_client)';
        $insert = $bdd->prepare($sql);
        $verif = $insert->execute([
                'montant' => $montant,
                'produit' => $produit,
                'quantite' => $quantite,
                'id_client' => $id,
        ]);

        if ($verif) {
            echo "insertion réussie";
        }
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" ></script>
    <title>Document</title>

</head>

<body>

<form action="add_facture.php" method="POST">
   
    <div>
        <h1>Créer une facture</h1>
    </div>
     <div class="dropdown">
  <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Clients
  </button>
  <ul class="dropdown-menu">
    <?php foreach ($clients as $item) {?>
        <li><a class="dropdown-item" href="add_facture.php?id_clients_selected=<?php echo $item['id_client']; ?>" ><?php echo $item['nom']." ".$item['prenom'] ?></a></li>
    <?php } ?>
  </ul>
</div>
<div><div>
        <?php
        if (isset($client) && is_array($client)) {
            echo $client['nom'] . " " . $client['prenom'];
        }
        ?>
        <input type="hidden" name="id_clients_selected" value="<?php echo $id; ?>">

    </div>
</div>
    <div class="form-group">
        <label for="montant">Montant</label>
        <input type="number" name="montant" step="0.01" class="form-control" value="<?php if(isset($_POST['montant'])) echo $_POST['montant'] ?>">
        <br>
            <?php
            if(isset($_POST['montant']) && empty($_POST['montant']))
            {
                echo "le montant est vide";
            }?>

    </div>
    <div class="form-group">
        <label for="produit" >produit</label>
        <input type="text" class="form-control" name="produit" id="produit" value="<?php if(isset($_POST['produit'])) echo $_POST['produit'] ?>">
        <br>
        <?php
        if(isset($_POST['produit']) && empty($_POST['produit']))
        {
            echo "le produit est vide";
        }?>
    </div>
        <div class="form-group">
        <label for="quantite">quantite</label>
        <input type="number" name="quantite" step="1" class="form-control" value="<?php if(isset($_POST['quantite'])) echo $_POST['quantite'] ?>">
        <br>
            <?php
            if(isset($_POST['quantite']) && empty($_POST['quantite']))
            {
                echo "le quantite est vide";
            }?>

    </div>
    <button type="submit" name="submit" class="btn btn-success">Enregistrer</button>
</form>

</body>
</html>