<?php

/* création du PDO */
$pdoAppart = new PDO(
    'mysql:host=localhost;dbname=php_intermediaire_william',
    'root', // utilisateur
    '', // mot de passe
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // La première ligne demande l'affichage des erreurs sql sous forme de warning
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // précise le jeu de caratère lorsque ces erreurs apparaissent
    )
);

/* message d'erreurs */
$message ="";

?>