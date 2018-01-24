<?php
require('inc/header.inc.php');
require('inc/init.inc.php');

// Vérification que le formulaire ne soit pas vide
if(!empty($_POST)){
    if(empty($_POST['marque'])){
        $msg_erreur .= '<div class="alert alert-danger col-md-offset-3 col-md-6"> Veuillez renseigner la marque du véhicule !</div>';
    }
    if(empty($_POST['modele'])){
        $msg_erreur .= '<div class="alert alert-danger col-md-offset-3 col-md-6"> Veuillez renseigner le modèle du véhicule !</div>';
    }
    if(empty($_POST['couleur'])){
        $msg_erreur .= '<div class="alert alert-danger col-md-offset-3 col-md-6"> Veuillez renseigner la couleur du véhicule !</div>';
    }
    if(empty($_POST['immatriculation'])){
        $msg_erreur .= '<div class="alert alert-danger col-md-offset-3 col-md-6"> Veuillez renseigner l\'immatriculation du véhicule !</div>';
    }
}
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
if(empty($msg_erreur)){ // Tout est ok (car pas de message d'erreur)
        //--> Immatriculation dispo
        $resultat = $pdo -> prepare("SELECT * FROM vehicule WHERE immatriculation = :immatriculation");
        $resultat -> bindParam(':immatriculation', $_POST['immatriculation'], PDO::PARAM_STR);
        $resultat -> execute();

        if($resultat -> rowCount() > 0){ // signifie que le pseudo est déja utilisé puisque supérieur à 0 donc pas nul
        // Nous aurion pu lui proposer 2/3 variante de son pseudo, en ayant vérifié qu'ils sont disponible.
        $msg_erreur .= '<div class="alert alert-danger col-md-offset-3 col-md-6"> Le numéro d\'immatriculation '. $_POST['immatriculation'].' n\'est pas dispobible.</div>';
        } else{
            //--> Insertion vehicule
            $resultat = $pdo -> prepare("INSERT INTO vehicule (marque, modele, couleur, immatriculation) VALUES (:marque, :modele, :couleur, :immatriculation )");
            $resultat -> bindParam(':marque', $_POST['marque'], PDO::PARAM_STR);
            $resultat -> bindParam(':modele', $_POST['modele'], PDO::PARAM_STR);
            $resultat -> bindParam(':couleur', $_POST['couleur'], PDO::PARAM_STR);
            $resultat -> bindParam(':immatriculation', $_POST['immatriculation'], PDO::PARAM_STR);
            if($resultat -> execute()){
                header("location: vehicule.php");
            }
        }
}// fin du if(empty($msg))

// Supression d'un vehicule
if(isset($_GET['id_vehicule'])){
 // on récupère la compétence par son ID dans l'url
    $efface = $_GET['id_vehicule'];
    $sql = " DELETE FROM vehicule WHERE id_vehicule = '$efface' ";
    $pdo ->query($sql);
    header("location: vehicule.php");
}

?>
<div class="panel panel-default">
    <div class="panel-heading">
        <p>Liste des véhicules</p>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Id véhicule</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Couleur</th>
                <th>Immatriculation</th>
                <th>Modification</th>
                <th>Supression</th>
            </tr>
            <tr>
            <?php foreach($resultat_vehicule as $valeur) {?>
               <td><?php echo $valeur['id_vehicule'] ;?></td>
               <td><?php echo $valeur['marque'] ;?></td>
               <td><?php echo $valeur['modele'] ;?></td>
               <td><?php echo $valeur['couleur'] ;?></td>
               <td><?php echo $valeur['immatriculation'] ;?></td>
               <td><a href="modif_vehicule.php?id_vehicule=<?= $valeur['id_vehicule']; ?>"><button type="button" class="btn btn-success">Modifier</button></a></td>
               <td><a href="vehicule.php?id_vehicule=<?= $valeur['id_vehicule']; ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
           </tr>
            <?php } ?>
        </table>
        </div>
    </div>
</div>
<?php
echo $msg_erreur;
echo $msg_validation; ?>

<div class="container">
    <form method="post" action="">
        <div class="form-group">
            <input type="text" class="form-control" id="marque" placeholder="Marque" name="marque">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="modele" placeholder="Modèle" name="modele">
        </div>
        <div class="form-group">
            <input type="couleur" class="form-control" id="couleur" placeholder="Couleur" name="couleur">
        </div>
      <div class="form-group">
          <input type="immatriculation" class="form-control" id="immatriculation" placeholder="Immatriculation" name="immatriculation">
      </div>
      <button type="submit" class="btn btn-default">Ajouter ce véhicule</button>
  </form>
</div>

<?php
require('inc/footer.inc.php');
 ?>
