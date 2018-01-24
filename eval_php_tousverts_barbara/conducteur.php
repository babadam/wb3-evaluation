<?php
require('inc/header.inc.php');
require('inc/init.inc.php');


// Vérification que le formulaire ne soit pas vide
if(!empty($_POST)){
    if(empty($_POST['prenom'])){
        $msg_erreur .= '<div class="alert alert-danger col-md-offset-3 col-md-6"> Veuillez renseigner votre prénom !</div>';
    }
    if(empty($_POST['nom'])){
        $msg_erreur .= '<div class="alert alert-danger col-md-offset-3 col-md-6"> Veuillez renseigner votre nom !</div>';
    }
}
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
if(empty($msg_erreur)){ // Tout est ok (car pas de message d'erreur)
            //--> Insertion conducteur
            $resultat = $pdo -> prepare("INSERT INTO conducteur (prenom, nom) VALUES (:prenom, :nom)");
            $resultat -> bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
            $resultat -> bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
            if($resultat -> execute()){
                header("location: conducteur.php");
            }


}// fin du if(empty($msg))

// Supression d'un conducteur
if(isset($_GET['id_conducteur'])){
 // on récupère la compétence par son ID dans l'url
    $efface = $_GET['id_conducteur'];
    $sql = " DELETE FROM conducteur WHERE id_conducteur = '$efface' ";
    $pdo ->query($sql);
    header("location: conducteur.php");
}
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <p>Liste des conducteurs</p>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Id conducteur</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Modification</th>
                <th>Supression</th>
            </tr>
            <tr>
            <?php foreach($resultat_conducteur as $valeur) {?>
               <td><?php echo $valeur['id_conducteur'] ;?></td>
               <td><?php echo $valeur['prenom'] ;?></td>
               <td><?php echo $valeur['nom'] ;?></td>
               <td><a href="modif_conducteur.php?id_conducteur=<?= $valeur['id_conducteur']; ?>"><button type="button" class="btn btn-success">Modifier</button></a></td>
               <td><a href="conducteur.php?id_conducteur=<?= $valeur['id_conducteur']; ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
           </tr>
            <?php } ?>
        </table>
        </div>
    </div>
</div>

<?php
echo $msg_erreur;
echo $msg_validation;
 ?>
<div class="container">
    <form method="post" action="">
        <div class="form-group">
            <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom">
        </div>
        <button type="submit" class="btn btn-info col-md-12">Ajouter ce conducteur</button>

    </form>
</div>


<?php
require('inc/footer.inc.php');
 ?>
