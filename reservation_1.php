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
$SERVER='localhost';
$utilisateur='root';
$motpasse='';
$base='gestion des v';
$connection=mysqli_connect('localhost','root','','gestion des v');


session_start();

// Vérifier si l'username est défini dans la session
if (!isset($_SESSION["username"])) {
    // Rediriger si l'username n'est pas défini
    header("Location: login_passager.php");
    exit();
}


if(!$connection){die("problem de connection".mysqli_connect_erro());}



$A=("SELECT id_vols,A1.nom_aeroport,A2.nom_aeroport,Date_depart,Heure_depart,Date_arrive,Heure_arrive,prix_billet 
            FROM vols,tarifs,aeroport A1,aeroport A2
            WHERE A1.id_aeroport = vols.id_aeroport_depart
               AND A2.id_aeroport = vols.id_aeroport_arrivee
                 AND vols.id_vols = tarifs.id_vol
                    
                       ");

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

    echo "<form action='reservation_2.php' method='post'>";
    
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
   echo "<input type='text' name='id_utilisateur' value='$username' placeholder='ID_Utilisateur'>";

   // Champ ID_vol
   echo "<input type='number' min=0 max=90 name='id_vol' placeholder='Entrer Votre Id_vols' required>";

   // Champ Date de réservation
   $dateReservation = date("Y-m-d");  // Format YYYY-MM-DD
   echo "<input type='date' name='date_reservation' value='$dateReservation' placeholder='Entrer Votre Date de reservation Ici'>";

   // Champ numero du siege
   echo "<input type='number' min=1 max=90 name='num_siege' placeholder='Entrer Votre Num_siege Ici' required>";

   // Bouton de soumission
   echo "<button type= submit class=btnn>Réserver</button>";
   echo "<button type= submit class=btnn> <a href='client.html'> Revenir</button></a>";

  
   

   


   echo "</form>";
    echo "</div>";

   echo "</form>";

   session_write_close();
   
   
}

else {
    // Rediriger si l'username n'est pas défini
    session_write_close();
    header("Location: login_passager.html");
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