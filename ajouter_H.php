<?php
$server='localhost';
$utilisateur='root';
$motpasse='';
$base='gestion_train';

$connection=mysqli_connect($server,$utilisateur,$motpasse,$base);
$H = $_POST["id"];
$train = $_POST["train"];
$gares = $_POST["gare"];
$arriver = $_POST["arrivee"];
$depart = $_POST["depart"];
$dates= $_POST["date"];


// SQL query to insert data into the table

$sql = ("INSERT INTO horaires VALUES ('$H','$train', '$gares', '$arriver', '$depart','$dates')");


if (mysqli_query($connection,$sql)) {
        echo "horaires Ajouté";
    } else {
        echo "Erreur d'Ajout";
    }
     ?>