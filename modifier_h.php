<?php
$SERVER='localhost';
$utilisateur='root';
$motpasse='';
$base='gestion_train';

$connection=mysqli_connect('localhost','root','','gestion_train');
$C=$_POST["horaire_id"];
$Code=$_POST["train_id"];
$non = $_POST["gare_id"];
$ville = $_POST["arrivee"];
$adresse = $_POST["depart"];
$adr = $_POST["date"];

$A= ("UPDATE horaires SET train_id='$Code' ,gare_id= '$non', H_arrivee='$ville' , H_depart='$adresse' , dates= '$adr'  WHERE horaire_id ='$C' ");

if(mysqli_query($connection,$A)){
   echo "modification parfaite" ;
}
else{
    header("Location: error_h.html");
} ?>