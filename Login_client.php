<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Form</title>
    <link rel="stylesheet" href="acceuill22.css">
</head>
<body>
    <div class="main"> <!--main --> 
        <div class="couleur">
        <div class="navbar"><!--main/navbar -->
             <div class="menu"><!--main/navbar/menu -->
               <div class="top">
           <img class="img" src="dj.jpg" height="35px" width="50px" align="left">
                <center>  <ul>
                   <li><a href="acceuil2.html">Acceuil</a></li>
                   <li><a href="propos.html">A Propos</a></li>
                   <li><a href="service1.html">SERVICE</a></li>
                   <li><a href="contact.html">CONTACT</a></li>
                </ul></center> 
                <img class="img" src="dj.jpg" height="35px" width="50px" align="right">
            </div>
               
             </div><!--main/navbar -->

                 <!--main/navbar -->

       </div> <!--main -->

       <style>

        .form{
         text-align: center;
         margin-left: 415px; 
        
         }

         h1{

            margin-left: 35px;
         }
         a{
            color: chartreuse;
         }
 
     </style>

<?php
    $server = 'localhost';
    $utilisateur = 'root';
    $motpasse = '';
    $base = 'gestion_train';

    $connection = mysqli_connect($server, $utilisateur, $motpasse, $base);

    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ID = $_POST['ID'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $telephone = $_POST['num'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $cmdp = $_POST['cmdp'];
       

       
            
        if($mdp != $cmdp  && $mdp != NULL ){ $message = "Confirmation incorrect !";}
        else{


        // Requête pour vérifier l'administrateur et le mot de passe
        $sql = "INSERT INTO passagers VALUES('$ID','$nom','$prenom','$telephone','$email','$mdp')";
        $result = $connection->query($sql);

        if ($result) {
                $message = header("Location: R1.php");
            } else {
                // Ajouter un message d'erreur si le nom d'administrateur ou le mot de passe est incorrect
                $message = "Nom d'administrateur ou mot de passe incorrect.";
            }
        } 
        
    
    
        // Fermer la connexion à la base de données
        $connection->close();
        }
    
    ?>

            <div class="content"><!--main/content -->
                <h1><span>Inscription</span></h1>
                
                <form action="Login_client.php" method="post" >
                    <div class="form" >

                    <?php if (!empty($message)): ?>
                    <?php echo $message; ?>
                    <?php endif; ?>

                    <br><br>

                       <center> <h2> INSCRIVEZ VOUS !</h2> </center> 
                       
                       <input type="text" name="ID" placeholder="Entrer votre ID" required>
                        <input type="text" name="nom" placeholder="Entrer votre nom"required>
                        <input type="text" name="prenom" placeholder="Entrer votre prenom"required>
                        <input type="text" name="num" placeholder="Entrer votre contact"required>
                        <input type="email" name="email" placeholder="Entrer votre Email"required>
                        <input type="password" name="mdp" placeholder="Enter votre mot de passe" required>
                        <input type="password" name="cmdp" placeholder="Confirmer votre mot de passe"required>

                        <button type="submit" class="btnn"> S'inscrire </button> 
                         <button type="submit" class="btnn"><a href="client.html">  Revenir </button></a>
                        <p class="liw"> Déja Inscrit ? <a href="login_P.php">Se connecter ici !</a></p>
                    </div>
                </form>
   
                
            </div>

            <div class="icons">
                <!-- Your existing social media icons code -->
            </div>
        </div><!--main -->
    </div>

</body>
</html>
