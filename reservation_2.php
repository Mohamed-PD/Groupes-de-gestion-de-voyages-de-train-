<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="soubaneh2.css">
</head>
<body>
    <div class="main2"> <!--main -->
        <div class="couleur">
        <div class="navbar"><!--main/navbar -->
             <div class="menu"><!--main/navbar/menu -->
               <div class="top">
           <img class="img" src="dj.jpg" height="35px" width="50px" align="left">
                <center>  <ul>
                   <li><a href="soubaneh.html">Acceuil</a></li>
                   <li><a href="about.html">A Propros</a></li>
                   <li><a href="service.html">Service</a></li>
                   <li><a href="contacte.html">CONTACT</a></li>
                    <li><a href="login_passager.php">Déconnection</a></li>
                </ul></center> 
                <img class="img" src="dj.jpg" height="35px" width="50px" align="right">
            </div>
               
             </div><!--main/navbar -->

                 <!--main/navbar -->

       </div> <!--main -->
       <div class="content"><!--main/content -->
           <h1><span>Veuillez_réserver</span></h1>
         
         <style>

           .form {
            text-align: center;
            margin-left: 415px; 
           
            }

            .message{
                  margin-left:50%;
                  margin-bottom:-50%;
                padding-top: -100px;
            color: white;
            text-align: center;
            }

           
        </style>




<?php
$server='localhost';
$utilisateur='root';
$motpasse='';
$base='gestion_train';

$connection=mysqli_connect($server,$utilisateur,$motpasse,$base);


$a = $_POST["passager_id"];
$b = $_POST["train_id"];
$c = $_POST["date_reservation"];
$d = $_POST["num_siege"];

// SQL query to insert data into the table

$sql = ("INSERT INTO reservations VALUES (NULL, '$c', $d, NULL,'$a',$b)");

$B= ("SELECT gares.gare_id ,trains.train_id ,trains.nom ,trains.ville_D ,trains.ville_A ,trains.siege ,horaires.H_arrivee ,horaires.H_depart 
FROM gares, trains, horaires WHERE gares.gare_id = horaires.gare_id  AND trains.train_id = horaires.train_id AND trains.train_id = $b");

$result=mysqli_query($connection,$B);

if($result){
    while($row=mysqli_fetch_row($result)){
       
       $vol = $row[0];
       $ville_dep = $row[1];
       $ville_arriv = $row[2];
       $date_d = $row[3];
       $heure_d = $row[4];
       $date_a = $row[5];
       $heure_a = $row[6];
       $prix = $row[7];

       session_start();

       $siege = $d;

$_SESSION['vol'] = $vol;
$_SESSION['ville_dep'] = $ville_dep;
$_SESSION['ville_arriv'] = $ville_arriv;
$_SESSION['date_d'] = $date_d;
$_SESSION['heure_d'] = $heure_d;
$_SESSION['date_a'] = $date_a;
$_SESSION['heure_a'] = $heure_a;
$_SESSION['prix'] = $prix;
$_SESSION['siege'] = $siege;

    }

}





if (mysqli_query($connection,$sql)) {

    
  
    $message = "votre reservation est bien reussi !";
    
} else {
    $message = "Cette place à été déja réservée";
    }

    
$A=("SELECT gares.gare_id ,trains.train_id ,trains.nom ,trains.ville_D ,trains.ville_A ,trains.siege ,horaires.H_arrivee ,horaires.H_depart 
FROM gares, trains, horaires WHERE gares.gare_id = horaires.gare_id  AND trains.train_id = horaires.train_id ");

$result=mysqli_query($connection,$A);
echo "<table border=6 cellspacing=2>
<tr>
<th>id_vols</th>
<th>Aeroport_depart</th>
<th>Aeroport_arrivee</th>
<th>Date_Depart</th>
<th>Heure_depart</th>
<th>Date_Arrivee</th>
<th>Heure_Arrivee</th>
<th>Prix_billet</th>


</tr>
";
echo "<tr>";



if($result){
while($row=mysqli_fetch_row($result)){
echo "<td>".$row[0]."</td>";
echo "<td>".$row[1]."</td>";
echo "<td>".$row[2]."</td>";
echo "<td>".$row[3]."</td>";
echo "<td>".$row[4]."</td>";
echo "<td>".$row[5]."</td>";
echo "<td>".$row[6]."</td>";
echo "<td>".$row[7]."</td>";


echo "</tr>";
}
echo "</table>";
}
else{
echo "affichage echoue";
}

//****************************************************************//
echo "<br>";
echo "<br>";



// Stocker une variable dans la session


// Vérifier si l'username est défini dans la session
if(isset($_SESSION['username'])) {
// Utiliser l'username
$username = $_SESSION['username'];

echo "<form action='reservation_2.php' method='POST'>";


 echo " <style>

           .form {
            text-align: center;
            margin-left: 415px; 
           
            }";
            echo "</style>";
    
   // Ajouter un formulaire dans un tableau
    echo "<div class=form>";
     if (!empty($message)):
     echo $message; 
     endif; echo"</td>"; echo"</tr>";

   echo "<h2>Veuillez_Réserver</h2>";

     

     
    
   // Champ ID_Utilisateur
   echo "<input type='text' name='passager_id' value='$username' placeholder='ID_Utilisateur'>";

   // Champ ID_vol
   echo "<input type='number' min=0 max=90 name='train_id' placeholder='Entrer Votre Id_vols' required>";

   // Champ Date de réservation
   $dateReservation = date("Y-m-d");  // Format YYYY-MM-DD
   echo "<input type='date' name='date_reservation' value='$dateReservation' placeholder='Entrer Votre Date de reservation Ici'>";

   // Champ numero du siege
   echo "<input type='number' min=1 max=90 name='num_siege' placeholder='Entrer Votre Num_siege Ici' required>";echo"<td>"; 
   // Bouton de soumission
   echo "<button type= submit class=btnn>Réserver</button>";
   echo "<button type= submit class=btnn> <a href='client.html'> Revenir</button></a>";

  
   

   


   echo "</form>";
    echo "</div>";

echo "</form>";

session_write_close();


}
?>


</div>
    

</div>

    
    </div>
    

</div>

             
                   </div><!--main -->
    
   
</body>
</html>
