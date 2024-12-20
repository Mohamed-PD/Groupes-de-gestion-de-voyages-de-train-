<?php

// Inclure le fichier de connexion à la base de données
include 'db_connection.php';

// Démarrer la session et vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login_P.php");
    exit();
}

// Récupérer l'utilisateur connecté
$user = $_SESSION['username'];

// Initialiser le message pour les erreurs ou confirmations
$message = "";

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $passager_id = $_POST['passager_id'];
    $ville_depart = trim($_POST['ville']);
    $date_reservation = date('Y-m-d', strtotime($_POST['date_train']));

    // Vérifier si tous les champs sont remplis
    if (!empty($ville_depart) && !empty($date_reservation)) {
        // Préparer la requête et exécuter la vérification de la date
        $stmt = $connection->prepare("SELECT * FROM trains WHERE date_T = ? AND ville_A = ?");
        $stmt->bind_param("ss", $date_reservation, $ville_depart);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            ;// Si un train est disponible, rediriger vers la page de confirmation
            header("Location: R1.php?status=success");
            exit();
        } else {
           // Si aucun train n'est disponible pour la date choisie
            $message = "Aucun train disponible pour cette date et cette ville.";
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation Train</title>
    <link rel="stylesheet" href="acceuill22.css">
</head>
<body>

<style>
    .message {
        margin: 20px auto;
        padding: 10px;
        text-align: center;
        color: white;
        background-color: red;
        border-radius: 5px;
        width: 50%;
    }
    .message.success {
        background-color: green;
    }
</style>

<div class="main2">
    <div class="couleur">
        <div class="navbar">
            <div class="menu">
                <div class="top">
                    <img class="img" src="dj.jpg" height="35px" width="50px" align="left">
                    <center>
                        <ul>
                            <li><a href="acceuil2.html">ACCEUIL</a></li>
                            <li><a href="propos.html">A Propos</a></li>
                            <li><a href="service1.html">SERVICE</a></li>
                            <li><a href="contact.html">CONTACT</a></li>
                        </ul>
                    </center>
                    <img class="img" src="dj.jpg" height="35px" width="50px" align="right">
                </div>
            </div>
        </div>
        <div class="content">
            <h1><span>Veuillez Recherche</span></h1>
            <?php if (!empty($message)): ?>
                <div class="message <?= strpos($message, 'succès') !== false ? 'success' : ''; ?>">
                    <?= htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>
            <form action="R0.php" method="POST" class="form">
                <input type="text" name="passager_id" value="<?= htmlspecialchars($user); ?>" placeholder="ID Utilisateur" readonly>
                <input type="text" name="ville" placeholder="Saisir votre ville d'arrivée" required>
                <input type="date" name="date_train" value="<?= date("Y-m-d"); ?>" required>
                <button type="submit" class="btnn">Recherche</button>
                <button class="btnn"><a href="reser2.php" style="text-decoration: none; color: white;">Revenir</a></button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
