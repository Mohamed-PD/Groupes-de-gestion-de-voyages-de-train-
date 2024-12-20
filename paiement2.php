<?php
session_start();

// Vérifiez si les détails de réservation sont disponibles dans la session
if (!isset($_SESSION['reservation'])) {
    header("Location: login_P.php");
    exit();
}
// Récupérer les données depuis la session
$reservation = $_SESSION['reservation'];
$passager_id = htmlspecialchars($reservation['passager_id']);
$train_id = htmlspecialchars($reservation['train_id']);
$date_reservation = htmlspecialchars($reservation['date_reservation']);
$num_siege = htmlspecialchars($reservation['num_siege']);

// Connexion à la base de données
$server = 'localhost';
$utilisateur = 'root';
$motpasse = '';
$base = 'gestion_train';
$connection = mysqli_connect($server, $utilisateur, $motpasse, $base);

if (!$connection) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Insérez les données de réservation dans la base de données
$sql = "INSERT INTO reservations (passager_id, train_id, num_place, date_de_reservation) 
        VALUES ('$passager_id', '$train_id', '$num_siege', '$date_reservation')";

if (mysqli_query($connection, $sql)) {
    echo "<h1>Votre réservation a été confirmée avec succès !</h1>";
    // Supprimez les données de la session après confirmation
    unset($_SESSION['passager_id']);
    unset($_SESSION['train_id']);
    unset($_SESSION['date_reservation']);
    unset($_SESSION['num_siege']);
} else {
    echo "Erreur lors de l'enregistrement de la réservation : " . mysqli_error($connection);
}

// Fermez la connexion
mysqli_close($connection);
?>
