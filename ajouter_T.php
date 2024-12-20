<?php
$server='localhost';
$utilisateur='root';
$motpasse='';
$base='gestion_train';

$connection=mysqli_connect($server,$utilisateur,$motpasse,$base);

$nonn = $_POST["Modifier"];
$ville = $_POST["nom"];
$ad = $_POST["type"];
$n = $_POST["capacite"];
$a = $_POST["villedep"];
$b = $_POST["villearr"];
$c = $_POST["siege"];
$dt = $_POST["date_T"];


// SQL query to insert data into the table

$sql = ("INSERT INTO trains VALUES ('$nonn', '$ville', '$ad','$n', '$a', '$b', '$c', '$dt')");


if (mysqli_query($connection,$sql)) {
        echo "Train Ajouté";
    } else {
        echo "Erreur d'Ajout";
    }
     ?>