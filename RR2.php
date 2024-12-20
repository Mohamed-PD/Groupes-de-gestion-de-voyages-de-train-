<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <link rel="stylesheet" href="soubaneh2.css">
</head>
<body>
    <div class="main2">
        <div class="couleur">
            <div class="navbar">
                <div class="menu">
                    <div class="top">
                        <img class="img" src="dj.jpg" height="35px" width="50px" align="left">
                        <center>
                            <ul>
                                <li><a href="soubaneh.html">Accueil</a></li>
                                <li><a href="about.html">À propos</a></li>
                                <li><a href="service.html">Service</a></li>
                                <li><a href="contacte.html">Contact</a></li>
                                <li><a href="login_P.php">Déconnexion</a></li>
                            </ul>
                        </center>
                        <img class="img" src="dj.jpg" height="35px" width="50px" align="right">
                    </div>
                </div>
            </div>
            <div class="content">
                <h1><span>Veuillez réserver</span></h1>
                <style>
                    .form {
                        text-align: center;
                        margin-left: 415px; 
                    }
                    .message {
                        margin: 20px auto;
                        padding: 10px;
                        text-align: center;
                        color: white;
                        background-color: red;
                        border-radius: 5px;
                        width: 50%;
                    }
                </style>

<?php
session_start();

$server = 'localhost';
$utilisateur = 'root';
$motpasse = '';
$base = 'gestion_train';

// Connexion à la base de données
$connection = mysqli_connect($server, $utilisateur, $motpasse, $base);
if (!$connection) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Vérifiez que les données sont présentes dans $_POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST["passager_id"]) || empty($_POST["train_id"]) || empty($_POST["date_reservation"]) || empty($_POST["num_siege"])) {
        die("Erreur : tous les champs doivent être remplis.");
    }

    // Récupération des données du formulaire
    $a = mysqli_real_escape_string($connection, $_POST["passager_id"]);
    $b = mysqli_real_escape_string($connection, $_POST["train_id"]);
    $c = mysqli_real_escape_string($connection, $_POST["date_reservation"]);
    $d = mysqli_real_escape_string($connection, $_POST["num_siege"]);

    // Vérification si le siège est déjà réservé
    $check_query = "SELECT * FROM reservations WHERE train_id = '$b' AND num_place = '$d'";
    $check_result = mysqli_query($connection, $check_query);

    if (!$check_result) {
        die("Erreur dans la requête : " . mysqli_error($connection));
    }

    if (mysqli_num_rows($check_result) > 0) {
        echo "<div class='message'>Cette place a déjà été réservée.</div>";
    } else {
        // Stocker les données dans la session
        $_SESSION['reservation'] = [
            'passager_id' => $a,
            'train_id' => $b,
            'date_reservation' => $c,
            'num_siege' => $d
        ];

        // Redirection vers la page de paiement
        header("Location: paiement11.php");
        exit();
    }
}

// Affichage des trains et horaires
$A = "SELECT gares.gare_id, trains.train_id, trains.nom, trains.ville_D, trains.ville_A, trains.siege, horaires.H_arrivee, horaires.H_depart 
      FROM gares, trains, horaires 
      WHERE gares.gare_id = horaires.gare_id AND trains.train_id = horaires.train_id";

$result = mysqli_query($connection, $A);

echo "<table border=6 cellspacing=2>
<tr>
<th>ID Gare</th>
<th>ID Train</th>
<th>Nom du train</th>
<th>Ville départ</th>
<th>Ville arrivée</th>
<th>Siège</th>
<th>Heure arrivée</th>
<th>Heure départ</th>
</tr>";

if ($result) {
    while ($row = mysqli_fetch_row($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row[0]) . "</td>";
        echo "<td>" . htmlspecialchars($row[1]) . "</td>";
        echo "<td>" . htmlspecialchars($row[2]) . "</td>";
        echo "<td>" . htmlspecialchars($row[3]) . "</td>";
        echo "<td>" . htmlspecialchars($row[4]) . "</td>";
        echo "<td>" . htmlspecialchars($row[5]) . "</td>";
        echo "<td>" . htmlspecialchars($row[6]) . "</td>";
        echo "<td>" . htmlspecialchars($row[7]) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Affichage échoué.";
}

// Fermer la connexion
mysqli_close($connection);
?>

<div class="message">
    <?php if (!empty($message)) echo $message; ?>
   <button class='cn'> <a href="R1.php">revenir</a></button>
</div>
            </div>
        </div>
    </div>
    
</body>
</html>