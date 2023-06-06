<?php

session_start();
$hote = 'localhost'; // hote bdd
$utilisateur = 'root';  //user bdd
$mdp = '';  //mdp bdd
$nombdd = 'soboma_stock'; // Nom de la base de données
$bdd = new PDO("mysql:host=$hote;dbname=$nombdd", $utilisateur, $mdp); //connexion bdd

?>