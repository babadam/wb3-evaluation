<?php

// Tableau contenant les indices ainsi que les valeurs sur Emmanuel Macron
$tab_infos = array(
    "Prénom" => 'Emmanuel',
    "Nom" => 'Macron',
    "Adresse" => '55 rue du Faubourg Saint-Honoré',
    "Code Postal" => '75008',
    "Ville" => 'Paris',
    "Email" => 'emmanuel.macron@france.fr',
    "Téléphone" => '0142928100',
    "Date de naissance" => '1977-12-21'
);

// Vérification que les données s'affichent correctement
// echo '<pre>';
// print_r($tab_infos);
// echo '</pre>';

// Affichage de mon tableau

echo '<ul>';
foreach($tab_infos as $indice => $valeur){
    echo '<li><b>' . $indice . '</b> : ' . $valeur . '</li>';
}
echo '</ul>';



 ?>
