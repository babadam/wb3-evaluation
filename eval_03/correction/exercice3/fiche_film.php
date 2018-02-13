<?php
// Ici je dois etre capable d'afficher les informations complémentaires de chaque film... 

// Donc je le récupérer dans la BDD, grace à.... l'ID de chaque. 

// Et comment l'ID va etre transmis à cette page ? PAR LE GET (URL)

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '');

$resultat = $pdo -> prepare("SELECT * FROM movies WHERE id_movies = :id");
$resultat -> bindParam(':id', $_GET['id'], PDO::PARAM_INT);
$resultat -> execute(); 

if($resultat -> rowCount() == 0){
	header('location:index.php');
}

$film = $resultat -> fetch(PDO::FETCH_ASSOC);
extract($film);

if(strpos($video, 'watch?v=')){
	$position = strpos($video, 'watch?v=');
	$code_video = substr($video, $position +8);
	$video = 'https://www.youtube.com/embed/' . $code_video;
}


?>


<h1><?= $title ?></h1>

<iframe width="560" height="315" src="<?= $video ?>" frameborder="0" allowfullscreen></iframe>


<ul>
	<li>Acteur : <?= $actors ?></li>
	<li>Réal : <?= $director ?></li>
	<li>Producteur : <?= $producer ?></li>
	<li>Date de sortie : <?= $year_of_prod ?></li>
	<li>Langue : <?= $language ?></li>
	<li><a href="<?= $video ?>">Lien de  la BA</a></li>
</ul>




