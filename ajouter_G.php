<?php
$server='localhost';
$utilisateur='root';
$motpasse='';
$base='gestion_train';

$connection=mysqli_connect($server,$utilisateur,$motpasse,$base);

$nonn = $_POST["Modifier"];
$non = $_POST["nom"];
$ville = $_POST["ville"];



// SQL query to insert data into the table

$sql = ("INSERT INTO gares VALUES ('$nonn', '$non', '$ville')");


if (mysqli_query($connection,$sql)) {
        echo "Gare Ajouté";
    } else {
        echo "Erreur d'Ajout";
    }
     ?>