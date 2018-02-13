<?php 

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '');

$resultat = $pdo -> query("SELECT id_movies, title, director, year_of_prod FROM movies");
$films = $resultat -> fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($films);
echo '</pre>'; 


echo 'Nombre de résultats : ' . $resultat -> rowCount() . '<br/><hr/>';


echo '<table border="1">';
echo '<tr>'; // ligne des titres 

for($i = 0; $i < $resultat -> columnCount(); $i++ ){	
	$colonne = $resultat -> getColumnMeta($i);
	echo '<th>' . $colonne['name'] . '</th>'; 
}
echo '<th>Voir plus</th>';

echo '</tr>';

foreach($films as $valeur){ 
	echo '<tr>';
		foreach($valeur as $valeur2){
			echo '<td>' . $valeur2. '</td>';
		}
		echo '<td><a href="fiche_film.php?id=' . $valeur['id_movies'] . '">Plus d\'infos</a></td>'; 
	echo '</tr>';
	
}
echo '</table>';


