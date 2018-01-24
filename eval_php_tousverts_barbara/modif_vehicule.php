<?php
require('inc/header.inc.php');
require('inc/init.inc.php');



// mise à jour d'un vehicule
if(isset($_POST['marque'])){ // par le nom d'une premier input
    $marque = addslashes($_POST['marque']);
    $modele = addslashes($_POST['modele']);
    $couleur = addslashes($_POST['couleur']);
    $immatriculation = addslashes($_POST['immatriculation']);
    $id_vehicule = $_POST['id_vehicule'];

    $pdo -> exec("UPDATE vehicule SET marque = '$marque', modele = '$modele', couleur = '$couleur', immatriculation = '$immatriculation' WHERE id_vehicule = '$id_vehicule'");
    header('location: vehicule.php');
    exit();
}

// je récupère la compétence
$id_vehicule = $_GET['id_vehicule']; // par l'id et get
$sql = $pdo -> query("SELECT * FROM vehicule WHERE id_vehicule = '$id_vehicule'"); // la requete eest égale à l'ID
$ligne_vehicule = $sql -> fetch();

$sql = $pdo -> query("SELECT * FROM vehicule WHERE id_vehicule = '$id_vehicule'");
$ligne_vehicule = $sql -> fetch();


?>

<div class="container">
    <h2>Modification d'un vehicule</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="prenom">Marque :</label><br>
            <input type="text" name="marque" id ="marque" value="<?= $ligne_vehicule['marque'] ?>"><br><br>
        </div>
        <div class="form-group">
            <label for="modele">Modèle :</label><br>
            <input type="text" name="modele" id= "modele" value="<?= $ligne_vehicule['modele'] ?>"><br><br>
        </div>
        <div class="form-group">
            <label for="couleur">Couleur :</label><br>
            <input type="text" name="couleur" id= "couleur" value="<?= $ligne_vehicule['couleur'] ?>"><br><br>
        </div>
        <div class="form-group">
            <label for="immatriculation">Immatriculation :</label><br>
            <input type="text" name="immatriculation" id= "immatriculation" value="<?= $ligne_vehicule['immatriculation'] ?>"><br><br>
        </div>
        <input hidden name="id_vehicule" value="<?= $ligne_vehicule['id_vehicule'] ?>">

        <input type="submit" name="" value="Modifier">
        </form>
    </body>
</html>

<?php include('inc/footer.inc.php'); ?>
