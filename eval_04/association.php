<?php
require('inc/header.inc.php');
require('inc/init.inc.php');

$resultat = $pdo -> query("SELECT * FROM conducteur");
$resultat_conducteur = $resultat -> fetchAll(PDO::FETCH_ASSOC);

$resultat = $pdo -> query("SELECT * FROM vehicule");
$resultat_vehicule = $resultat -> fetchAll(PDO::FETCH_ASSOC);


// $resultat_vehicule = $pdo -> exec("SELECT * FROM vehicule");

?>
<div class="container">
    <form method="post" action="">
        <div class="form-group">
            <label for="conducteur"> Conducteur</label>
            <select class="form-control" name="conducteur">
                <?php
                    foreach ($resultat_conducteur as $indice => $valeur) {
                        echo '<option>' . $valeur['nom'] . ' ' . $valeur['prenom'] . '</option>';
                    }

                 ?>
            </select>
        </div>
        <div class="form-group">
            <label for="vehicule">Véhicule</label>
            <select class="form-control" name="vehicule">
                <?php
                    foreach ($resultat_vehicule as $indice => $valeur) {
                        echo '<option>' . $valeur['marque'] . ' ' . $valeur['modele'] . ' ' . $valeur['id_vehicule'] . '</option>';
                    }
                 ?>
            </select>
        </div>

        <button type="submit" class="btn btn-default">Ajouter cette association</button>
    </form>
</div>
<?php
require('inc/footer.inc.php');
 ?>
