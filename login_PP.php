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
                   <li><a href="service.html">SERVICE</a></li>
                   
                   <li><a href="contacte.html">CONTACT</a></li>
                </ul></center> 
                <img class="img" src="dj.jpg" height="35px" width="50px" align="right">
            </div>
               
             </div><!--main/navbar -->

                 <!--main/navbar -->

       </div> <!--main -->
       <div class="content"><!--main/content -->
           <h1><span>Connexion</span></h1>
         
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
    $server = 'localhost';
    $utilisateur = 'root';
    $motpasse = '';
    $base = 'gestion_traine';

    $connection = mysqli_connect($server, $utilisateur, $motpasse, $base);

    $message = '';  // Variable pour stocker le message d'erreur

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST["username"];
        $mdp = $_POST["password"];

        session_start();

// Stocker une variable dans la session

$_SESSION['username'] = $number;

        // Requête pour vérifier l'administrateur et le mot de passe
        $sql = "SELECT * FROM passagers WHERE passager_id = '$number'";
        $result = $connection->query($sql);

        if ($result) {
            // Vérifier le nombre de lignes retournées
            if ($result->num_rows > 0) {
              $row = mysqli_fetch_assoc($result);
              if(password_verify($mdp, $row['motdepass'])){
                $message = "Salut";
              }
            } else {
                // Ajouter un message d'erreur si le nom d'administrateur ou le mot de passe est incorrect
                $message = "ID ou mot de passe incorrect.";
            }
        } else {
            $message = "Erreur lors de l'exécution de la requête : " . $connection->error;
        }

        // Fermer la connexion à la base de données
        $connection->close();
        
    }
    ?>


           
<form action="login_PP.php" method="POST">
               <div class="form">
               
<?php if (!empty($message)): ?>
<?php echo $message; ?>
<?php endif; ?>
<br>
                <h2>Login Here</h2>
                
                <input type="text" name="username" placeholder="Entrer Votre Identifiant Ici">
                <input type="password" name="password" placeholder="Entrer Votre Mot De Passe Ici">
                <button type="submit" class="btnn">Se Connecter</button>
                <button type="reset" class="btnn"><a href="#">Annuler</a></button>
                <button type="" class="btnn"><a href="login_client_new.php">Revenir</button></a></div>
</form>



             

                    <div class="icons">
                    <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
                </div>

                

         
           
            

       

    </div>
    

</div>

    
    </div>
    

</div>

             
                   </div><!--main -->
    
   
</body>
</html>