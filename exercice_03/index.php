<?php

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

$msg = ''; // création d'une variable permettant d'afficher message erreurs/validation

if(!empty($_POST)){

    //verification des champs titre, acteur, réalisateur(director), producteur et synopsis(storyline)
    if (strlen($_POST['title']) < 5 || is_numeric($_POST['title']) ){
        $msg .= '<div class="erreur"> Le champs titre n\'est pas valide : il doit contenir 5 caractères minimum et ne doit pas être composé que de chiffres ! </div>';
    }
    if (strlen($_POST['actors']) < 5 || is_numeric($_POST['actors']) ){
        $msg .= '<div class="erreur"> Le champs acteurs n\'est pas valide : il doit contenir 5 caractères minimum et ne doit pas être composé que de chiffres ! </div>';
    }
    if (strlen($_POST['director']) < 5 || is_numeric($_POST['director']) ){
        $msg .= '<div class="erreur"> Le champs réalisateur n\'est pas réalisateur : il doit contenir 5 caractères minimum et ne doit pas être composé que de chiffres ! </div>';
    }
    if (strlen($_POST['producer']) < 5 || is_numeric($_POST['producer']) ){
        $msg .= '<div class="erreur"> Le champs producteur n\'est pas valide : il doit contenir 5 caractères minimum et ne doit pas être composé que de chiffres ! </div>';
    }
    if (strlen($_POST['storyline']) < 5 || is_numeric($_POST['storyline']) ){
        $msg .= '<div class="erreur"> Le champs synopsis n\'est pas valide : il doit contenir 5 caractères minimum et ne doit pas être composé que de chiffres ! </div>';
    }

    // Vérification de l'URL
    $verif_url = filter_var($_POST['video'], FILTER_VALIDATE_URL);

    if(!empty($_POST['video'])){
        if(!$verif_url){
            $msg .= '<div class="erreur"> Veuillez renseigner une URL valide.</div>';
        }
    }
    else{
            $msg .='<div class="erreur"> Veuillez renseigner une URL.</div>';
    }



// insertion en base de donnée
    if(empty($msg)){
        $resultat = $pdo -> prepare("INSERT INTO movies (title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES (:title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline, :video)");
        $resultat -> bindParam(':title', $_POST['title'], PDO::PARAM_STR);
        $resultat -> bindParam(':actors', $_POST['actors'], PDO::PARAM_STR);
        $resultat -> bindParam(':director', $_POST['director'], PDO::PARAM_STR);
        $resultat -> bindParam(':year_of_prod', $_POST['year_of_prod'], PDO::PARAM_INT);
        $resultat -> bindParam(':producer', $_POST['producer'], PDO::PARAM_STR);
        $resultat -> bindParam(':language', $_POST['language'], PDO::PARAM_STR);
        $resultat -> bindParam(':category', $_POST['category'], PDO::PARAM_STR);
        $resultat -> bindParam(':storyline', $_POST['storyline'], PDO::PARAM_STR);
        $resultat -> bindParam(':video', $_POST['video'], PDO::PARAM_STR);
        $resultat -> execute();

        $msg .= '<div class="validation"> Le film a bien été enregistré en base de donnée.</div>';
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
        <form method="post" enctype="multipart/form-data">
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
                <option>Comédie</option>
                <option>Horreur</option>
                <option>Drame</option>
                <option>Documentaire</option>
            </select><br><br>

            <label>Synopsis :</label><br>
            <textarea name="storyline" rows="8" cols="40"></textarea><br><br>

            <label>Lien video de la bande annonce :</label><br>
            <input type="text" name="video"><br><br>

            <input type="submit" name="" value="Enregistrer">



        </form>
    </body>
</html>
