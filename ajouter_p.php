<?php
$server='localhost';
$utilisateur='root';
$motpasse='';
$base='gestion_train';

$connection=mysqli_connect($server,$utilisateur,$motpasse,$base);
$no = $_POST["id"];
$nonn = $_POST["nom"];
$non = $_POST["prenom"];
$adresse = $_POST["telephone"];
$ville = $_POST["email"];
$v = $_POST["mdp"];




// SQL query to insert data into the table

$sql = ("INSERT INTO passagers VALUES ('$no','$nonn', '$non', '$adresse', '$ville', '$v')");


if (mysqli_query($connection,$sql)) {
        echo "passager Ajouté";
    } else {
        echo "Erreur d'Ajout";
    }
     ?>