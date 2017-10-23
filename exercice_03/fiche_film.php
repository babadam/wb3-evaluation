<?php

// Connexion BDD exercice_3
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

$msg='';

if(isset($_GET['title']) && !empty($_GET['title'])){

	$resultat = $pdo -> prepare("SELECT * FROM movies WHERE title = :title");
	$resultat -> bindParam(':title', $_GET['title'], PDO::PARAM_STR);
	$resultat -> execute();

	if($resultat -> rowCount() > 0){ // le produit existe bien
		$film = $resultat -> fetch(PDO::FETCH_ASSOC);
		extract($film);
        // print_r($film);

	}
	else{ //le film n'existe pas : message d'erreur
        $msg .= '<div style="color: red;"> Ce film n\'existe pas, veuillez en séléctionnez un autre <a href=\"tableau.php"> ici </a></div>';

	}
}
else{

    header('location:tableau.php');
}
?>

<h1>Fiche film : <?= $title ?></h1>
<?= $msg ?>
<p>Détails du film : </p>
<ul>
	<li><b>Titre</b> : <?= $title ?></li>
	<li><b>Acteurs</b> : <?= $actors ?></li>
	<li><b>Réalisateur</b> : <?= $director ?></li>
	<li><b>Producteur</b> : <?= $producer ?></li>
	<li><b>Année de production</b> : <?= $year_of_prod ?></li>
	<li><b>Langue</b> : <?= $language ?></li>
	<li><b>Catégorie</b> : <?= $category ?></li>
	<li><b>Synopsis</b> : <?= $storyline ?></li>
	<li><b>Bande-annonce</b> : <?= $video ?></li>
</ul>
<br/>

<a href="tableau.php">Retour au tableau contenant les films</a>
