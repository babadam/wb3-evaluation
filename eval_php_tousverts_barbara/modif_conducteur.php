<?php
require('inc/header.inc.php');
require('inc/init.inc.php');



// mise à jour d'un conducteur
if(isset($_POST['prenom'])){ // par le nom d'une premier input
    $prenom = addslashes($_POST['prenom']);
    $nom = addslashes($_POST['nom']);
    $id_conducteur = $_POST['id_conducteur'];

    $pdo -> exec("UPDATE conducteur SET prenom = '$prenom', nom = '$nom' WHERE id_conducteur = '$id_conducteur'");
    header('location: conducteur.php');
    exit();
}

// je récupère la compétence
$id_conducteur = $_GET['id_conducteur']; // par l'id et get
$sql = $pdo -> query("SELECT * FROM conducteur WHERE id_conducteur = '$id_conducteur'"); // la requete eest égale à l'ID
$ligne_conducteur = $sql -> fetch();

$sql = $pdo -> query("SELECT * FROM conducteur WHERE id_conducteur = '$id_conducteur'");
$ligne_conducteur = $sql -> fetch();


?>

<div class="container">
    <h2>Modification d'un conducteur</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="prenom">Prénom :</label><br>
            <input type="text" name="prenom" id ="prenom" value="<?= $ligne_conducteur['prenom'] ?>"><br><br>
        </div>
        <div class="form-group">
            <label for="nom">Nom :</label><br>
            <input type="text" name="nom" id= "nom" value="<?= $ligne_conducteur['nom'] ?>"><br><br>
        </div>
        <input hidden name="id_conducteur" value="<?= $ligne_conducteur['id_conducteur'] ?>">

        <input type="submit" name="" value="Modifier">
        </form>
    </body>
</html>

<?php include('inc/footer.inc.php'); ?>
