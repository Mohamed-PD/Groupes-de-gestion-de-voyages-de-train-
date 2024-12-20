<?php
$SERVER='localhost';
$utilisateur='root';
$motpasse='';
$base='gestion_train';

$connection=mysqli_connect('localhost','root','','gestion_train');
$no = $_POST["ID"];
$nonn = $_POST["nom"];
$non = $_POST["prenom"];
$ville = $_POST["email"];
$adresse = $_POST["telephone"];

$A= ("UPDATE passagers SET nom='$nonn' , prénom='$non' , email='$ville' , téléphone='$ville' WHERE 	passager_id ='$no' ");

if(mysqli_query($connection,$A)){
   echo "modification parfaite" ;
}
else{
    header("Location: error_p.html");
} ?>