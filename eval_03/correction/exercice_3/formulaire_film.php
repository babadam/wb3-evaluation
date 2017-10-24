<?php 

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '');

$msg = '';

if(!empty($_POST)){
	
	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>'; 
	
	if(!empty($_POST['title'])){
		if(strlen($_POST['title']) < 5){
			$msg .= '<p>Le champs TITRE doit comporter au moins 5 caractères !</p>';
		}
	}
	else{
		$msg .= '<p>Le champs TITRE est obligatoire !</p>';
	}

	
	if(!empty($_POST['director'])){
		if(strlen($_POST['director']) < 5){
			$msg .= '<p>Le champs REALISATEUR doit comporter au moins 5 caractères !</p>';
		}
	}
	else{
		$msg .= '<p>Le champs REALISATEUR est obligatoire !</p>';
	}
	
	if(!empty($_POST['actors'])){
		if(strlen($_POST['actors']) < 5){
			$msg .= '<p>Le champs ACTEURS doit comporter au moins 5 caractères !</p>';
		}
	}
	else{
		$msg .= '<p>Le champs ACTEURS est obligatoire !</p>';
	}
	
	
	if(!empty($_POST['producer'])){
		if(strlen($_POST['producer']) < 5){
			$msg .= '<p>Le champs PRODUCTEUR doit comporter au moins 5 caractères !</p>';
		}
	}
	else{
		$msg .= '<p>Le champs PRODUCTEUR est obligatoire !</p>';
	}
	
	if(!empty($_POST['storyline'])){
		if(strlen($_POST['storyline']) < 5){
			$msg .= '<p>Le champs SYNOPSIS doit comporter au moins 5 caractères !</p>';
		}
	}
	else{
		$msg .= '<p>Le champs SYNOPSIS est obligatoire !</p>';
	}
	
	
	if(!empty($_POST['video'])){
		
		
		if(!filter_var($_POST['video'], FILTER_VALIDATE_URL)) 
		{
			$msg .= '<p>Le champs VIDEO n\'est pas valide !</p>';
		}	
	}
	else{
		$msg .= '<p>Le champs VIDEO est obligatoire !</p>';
	}
	
	if(empty($msg)){ // TOUT EST OK !! 
	
		$resultat = $pdo -> prepare("INSERT INTO movies (title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES (:title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline, :video)");
		
		$resultat -> bindParam(':title', $_POST['title'], PDO::PARAM_STR);
		$resultat -> bindParam(':actors', $_POST['actors'], PDO::PARAM_STR);
		$resultat -> bindParam(':director', $_POST['director'], PDO::PARAM_STR);
		$resultat -> bindParam(':producer', $_POST['producer'], PDO::PARAM_STR);
		$resultat -> bindParam(':year_of_prod', $_POST['year_of_prod'], PDO::PARAM_STR);
		$resultat -> bindParam(':language', $_POST['language'], PDO::PARAM_STR);
		$resultat -> bindParam(':category', $_POST['category'], PDO::PARAM_STR);
		$resultat -> bindParam(':storyline', $_POST['storyline'], PDO::PARAM_STR);
		$resultat -> bindParam(':video', $_POST['video'], PDO::PARAM_STR);
		
		if($resultat -> execute()){
			$msg .= '<p>Félicitations, le fil a été ajouté !</p>';
		}
		
		
	}	
}







?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css"/>
        <title>Cinéma</title>
    </head>
    <body>
        <form method="post" action="">
		<?= $msg ?>
            <label>Titre :</label><br>
            <input type="text" name="title"><br><br>

            <label>Acteurs :</label><br>
            <input type="text" name="actors"><br><br>

            <label>Réalisateur :</label><br>
            <input type="text" name="director"><br><br>

            <label>Producteur :</label><br>
            <input type="text" name="producer"><br><br>

            <label>Année de production :</label>
            <select name='year_of_prod'>
                <?php
                    $year = date("Y");
                	while($year >= 1895){
                        echo '<option>'.$year.'</option>';
                        $year--;
                    }
                ?>
            </select><br><br>

            <label>Langue :</label>
            <select name='language'>
                <option>Français</option>
                <option>Anglais</option>
                <option>Italien</option>
                <option>Allemand</option>
                <option>Chinois</option>
            </select><br><br>

            <label>Catégorie :</label>
            <select name='category'>
                <option value="comedie">Comédie</option>
                <option value="horreur">Horreur</option>
                <option value="drame">Drame</option>
                <option value="documentaire">Documentaire</option>
            </select><br><br>

            <label>Synopsis :</label><br>
            <textarea name="storyline" rows="8" cols="40"></textarea><br><br>

            <label>Lien video de la bande annonce :</label><br>
            <input type="text" name="video"><br><br>

            <input type="submit" name="" value="Enregistrer">
        </form>
    </body>
</html>