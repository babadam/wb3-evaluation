<?php

//  CONNEXION BDD
$pdo = new PDO('mysql:host=localhost;dbname=vtc', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
));

// initialisation variable vide
$msg_erreur='';
$msg_validation='';

// requete pour afficher les conducteurs
$resultat = $pdo -> query("SELECT * FROM conducteur");
$resultat_conducteur = $resultat -> fetchAll(PDO::FETCH_ASSOC);

// requête pour afficher les véhicules
$resultat = $pdo -> query("SELECT * FROM vehicule");
$resultat_vehicule = $resultat -> fetchAll(PDO::FETCH_ASSOC);
