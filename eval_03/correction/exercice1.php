<?php 

$etudiant = array(
	'prenom' => 'Yakine',
	'nom' => 'Hamida',
	'adresse' => '11 allée saint exupery',
	'code_postal' => '92390',
	'ville' => 'Villeneuve',
	'email' => 'yakine.hamida@gmail.com',
	'telephone' => '0102030102',
	'date_naissance' => '1985-12-01'
); 

$annee = substr($etudiant['date_naissance'], 0, 4);
$mois = substr($etudiant['date_naissance'], 5, 2);
$jour = substr($etudiant['date_naissance'], -2);

$date_fr = $jour . '/' . $mois  . '/' . $annee;

echo '<ul>'; 
foreach($etudiant as $indice => $valeur){
	if($indice != 'date_naissance'){
		echo '<li>' . $indice . ' : ' . $valeur . '</li>';
	}
}
echo '<li>' . $date_fr . '</li>';
echo '</ul>';


