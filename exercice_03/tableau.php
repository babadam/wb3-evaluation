<?php

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

// Requête permettant d'afficher le titre, le réalisateur et l'année de production
$resultat = $pdo -> query("SELECT title, director, year_of_prod FROM movies");
$enregistrement = $resultat -> fetchAll(PDO::FETCH_ASSOC);
$resultat -> rowCount();

// <!-- Tableau HTML permettent d'afficher la requête ci dessus ainsi qu'un lien vers la fiche du film -->

echo '<table border ="5">';
echo '<tr>'; // Ligne de titre

for($i = 0; $i < $resultat -> columnCount(); $i++){
    $colonne = $resultat -> getColumnMeta($i);
    echo '<th>'.$colonne['name'].'</th>';
}
echo '<th> Fiche du film </th>';
echo '</tr>'; // fin de ligne de titre

// Ligne des données correspondant au titre
foreach($enregistrement as $valeur){
    echo '<tr>';
        foreach ($valeur as $valeur2) {
            echo '<td>'. $valeur2. '</td>';
        }
    echo '<td><a href="fiche_film.php?title='.$valeur['title'].'"> Plus d\'infos </a></td>';
    echo '</tr>';
}

echo '</table>';
// Fin du tableau html



















?>
