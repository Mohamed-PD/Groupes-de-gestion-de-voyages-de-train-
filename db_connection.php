<?php
// Détails de la connexion à la base de données
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'gestion_train';

// Établir une connexion sécurisée à la base de données
$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error) {
    die("Erreur de connexion : " . $connection->connect_error);
}
?>