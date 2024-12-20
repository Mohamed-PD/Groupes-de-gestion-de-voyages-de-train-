<?php
$SERVER='localhost';
$utilisateur='root';
$motpasse='';
$base='gestion_train';

$connection=mysqli_connect('localhost','root','','gestion_train');
$Code=$_POST["Modifier"];
$non = $_POST["nom"];
$ville = $_POST["ville"];

$A= ("UPDATE gares SET nom='$non' , ville='$ville'   WHERE gare_id='$Code' ");

if(mysqli_query($connection,$A)){
   echo "modification parfaite" ;
}
else{
    header("Location: Error.html");
} ?>