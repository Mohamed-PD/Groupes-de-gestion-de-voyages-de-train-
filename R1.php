<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="acceuill22.css">
</head>
<body>
    <div class="main2"> <!--main -->
        <div class="couleur">
        <div class="navbar"><!--main/navbar -->
             <div class="menu"><!--main/navbar/menu -->
               <div class="top">
           <img class="img" src="dj.jpg" height="35px" width="50px" align="left">
                <center>  <ul>
                   <li><a href="acceuil2.html">ACCEUIL</a></li>
                   <li><a href="propos.html">A Propros</a></li>
                   <li><a href="service1.html">SERVICE</a></li>
                   <li><a href="contact.html">CONTACT</a></li>
                </ul></center> 
                <img class="img" src="dj.jpg" height="35px" width="50px" align="right">
            </div>
               
             </div><!--main/navbar -->

                 <!--main/navbar -->

       </div> <!--main -->
       <div class="content"><!--main/content -->
           <h1><span>Veuillez Réserver</span></h1>
         
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
$SERVER='localhost';
$utilisateur='root';
$motpasse='';
$base='gestion_train';
$connection=mysqli_connect('localhost','root','','gestion_train');


session_start();

// Vérifier si l'username est défini dans la session
if (!isset($_SESSION["username"])) {
    // Rediriger si l'username n'est pas défini
    header("Location: RR2.php");
    exit();
}


if(!$connection){die("problem de connection".mysqli_connect_erro());}



$A=("SELECT gares.gare_id,trains.train_id ,trains.nom ,trains.ville_D ,trains.ville_A ,trains.siege,horaires.H_arrivee ,horaires.H_depart, trains.date_T FROM gares, trains, horaires WHERE gares.gare_id = horaires.gare_id 
  AND trains.train_id = horaires.train_id ");

$result=mysqli_query($connection,$A);
echo "<table border=6 cellspacing=2>
<tr>
<th>id_gares</th>
<th>id_trains</th>
<th>Nom_trains</th>
<th>Ville_depart</th>
<th>ville_Arriver</th>
<th>siege</th>
<th>Heure_Arrivee</th>
<th>Heure_depart</th>
<th>Date_disponibiliter</th>


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
        echo "<td>".$row[8]."</td>";
        
       
        
       
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

    echo "<form action='RR2.php' method='POST'>";
    
    echo " <style>

           .form {
            text-align: center;
            margin-left: 415px; 
           
            }";
            echo "</style>";
    
   // Ajouter un formulaire dans un tableau
    echo "<div class=form>";

   echo "<h2>Veuillez_Réserver</h2>";

     

     
    
   // Champ ID_Utilisateur
   echo "<input type='number' name='passager_id' value='$username' placeholder='ID_Utilisateur'>";

   // Champ ID_vol
   echo "<input type='number' min=0 max=90 name='train_id' placeholder='Entrer Votre Id_Trains' required>";

   // Champ Date de réservation
   $dateReservation = date("Y-m-d");  // Format YYYY-MM-DD
   echo "<input type='date' name='date_reservation' value='$dateReservation' placeholder='Entrer Votre Date de reservation Ici'>";

   // Champ numero du siege
   echo "<input type='number' min=1 max=90 name='num_siege' placeholder='Entrer Votre Num_siege Ici' required>";

   // Bouton de soumission
   echo "<button type= submit class=btnn>Réserver</button>";
   echo "<button type= submit class=btnn> <a href='reser2.php'> Revenir</button></a>";

  
   

   


   echo "</form>";
    echo "</div>";

   echo "</form>";

   session_write_close();
   
   
}

else {
    // Rediriger si l'username n'est pas défini
    session_write_close();
    header("Location: reservation_2.php");
    exit();
    
}


?>

</div>
    

</div>

    
    </div>
    

</div>

             
                   </div><!--main -->
    
   
</body>
</html>