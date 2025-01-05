<?php
$SERVER='localhost';
$utilisateur='root';
$motpasse='';
$base='gestion_train';

$connection=mysqli_connect('localhost','root','','gestion_train');
$Code=$_POST["Modifier"];
$ville = $_POST["nom"];
$adresse = $_POST["type"];
$C=$_POST["capacite"];
$no = $_POST["villedep"];
$v = $_POST["villearr"];
$ad = $_POST["siege"];
$a = $_POST["date_T"];

$A= ("UPDATE trains SET  nom='$ville' ,types='$adresse', Capacité='$C',ville_D='$no',ville_A='$v ',siege=$ad,date_T='$a '  WHERE train_id='$Code' ");

if(mysqli_query($connection,$A)){
   echo "modification parfaite" ;
}
else{
    header("Location: error_T.html");
} ?>