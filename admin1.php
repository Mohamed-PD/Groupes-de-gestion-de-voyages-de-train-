<!DOCTYPE html>
<html lang="en">
<head>
    <title>Acceuil2</title>
    <link rel="stylesheet" href="acceuill22.css">
</head>
<body>

    <div class="main"> <!--main -->
        <div class="couleur">
         <div class="navbar"><!--main/navbar -->
              <div class="menu"><!--main/navbar/menu -->
                <div class="top">
            <img class="img" src="s4.2.jpg" height="35px" width="50px" align="left">
                 <center>  <ul>
                    <li><a href="acceuil2.html">Acceuil</a></li>
                    <li><a href="propos.html">A Propos</a></li>
                    <li><a href="service1.html">SERVICE</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                 </ul></center> 
                 <img class="img" src="s4.2.jpg" height="35px" width="50px" align="right"></div>
                
              </div><!--main/navbar -->

                  <!--main/navbar -->

        </div> <!--main -->

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

 .mo{
    
    margin: 0%;
 }

</style>




        <?php
    $server = 'localhost';
    $utilisateur = 'root';
    $motpasse = '';
    $base = 'gestion_train';

    $connection = mysqli_connect($server, $utilisateur, $motpasse, $base);

    $message = '';  // Variable pour stocker le message d'erreur

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST["number"];
        $mdp = $_POST["mdp"];

        // Requête pour vérifier l'administrateur et le mot de passe
        $sql = "SELECT * FROM administrateur WHERE admin_id  = '$number' AND mdp = '$mdp'";
        $result = $connection->query($sql);

        if ($result) {
            // Vérifier le nombre de lignes retournées
            if ($result->num_rows > 0) {
             $message= header("Location: interfaceA.html");
            } else {
                // Ajouter un message d'erreur si le nom d'administrateur ou le mot de passe est incorrect
                $message = "Nom d'administrateur ou mot de passe incorrect.";
            }
        } else {
            $message = "Erreur lors de l'exécution de la requête : " . $connection->error;
        }

        // Fermer la connexion à la base de données
        $connection->close();
    }
    ?>

    <div class="mo">
      
        <form action="admin.php" method="post">

        <div class="form">
            
            <h2>CONNEXION</h2>

            <input type="text" name="number" placeholder="Entre votre ID">
            <input type="password" name="mdp" placeholder="Entre votre de passe">
            <button class="btnn"><a href="#">Se connecter</a></button>

            <p class="link">Vous n'avez pas un compte<br>
            <a href="#">Mot de passe oublier</a> here</a></p>
            <p class="liw">Envoyez</p>
            
         </form>

         


            <div class="icons">
                <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
           
           
            </div>

            

        </div>

        <div class="message">
<?php if (!empty($message)): ?>
<p  style="color: white;"><?php echo $message; ?></p>
<?php endif; ?>
</div>
        </div>
        




    </div><!--xxx-->
</div>
</div>
</div>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>