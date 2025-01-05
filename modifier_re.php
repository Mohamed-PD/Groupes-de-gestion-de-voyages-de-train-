<?php
$SERVER='localhost';
$utilisateur='root';
$motpasse='';
$base='gestion_train';

$connection=mysqli_connect('localhost','root','','gestion_train');
$C=$_POST["reservation_id"];
$Code=$_POST["passager_id"];
$non = $_POST["train_id"];
$ville = $_POST["num_place"];
$adresse = $_POST["date_reservation"];

$A= ("UPDATE reservations SET passager_id ='$Code' ,train_id= '$non',num_place ='$ville' , date_de_reservation='$adresse'   WHERE reservation_id  ='$C' ");

if(mysqli_query($connection,$A)){
   echo "modification parfaite" ;
}
else{
    header("Location: error_r.html");
} ?>