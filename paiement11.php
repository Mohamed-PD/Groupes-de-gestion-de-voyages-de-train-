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

// Chemin du fichier JSON
$default_json_file = 'paiements_effectues.json';

// Créer le fichier JSON s'il n'existe pas
if (!file_exists($default_json_file)) {
    file_put_contents($default_json_file, json_encode([]));
}

// Charger les paiements effectues
$paiements_effectues = json_decode(file_get_contents($default_json_file), true);
$paiement_effectue = isset($paiements_effectues[$passager_id]) && $paiements_effectues[$passager_id] === true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation et Paiement</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
            padding: 20px 30px;
            text-align: center;
        }

        h1 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .details p {
            font-size: 18px;
            margin: 10px 0;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            background-color: #4CAF50;
            color: #fff;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 16px;
            margin: 10px 5px;
            border: none;
        }

        .btn-danger {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Confirmation et Paiement</h1>
        <div class="details">
            <p>Passager ID : <strong><?php echo $passager_id; ?></strong></p>
            <p>Train ID : <strong><?php echo $train_id; ?></strong></p>
            <p>Date de Réservation : <strong><?php echo $date_reservation; ?></strong></p>
            <p>Numéro de Siège : <strong><?php echo $num_siege; ?></strong></p>
        </div>

        <p>Veuillez effectuer le paiement vers ce Numéro : <strong>+253 77519456</strong></p>

        <?php if ($paiement_effectue): ?>
            <a href="paiement2.php">
                <button class="btn">Confirmer la Réservation</button>
            </a>
        <?php else: ?>
            <p>Le paiement n'a pas encore été confirmé.</p>
        <?php endif; ?>

        <a href="RR2.php">
            <button class="btn btn-danger">Annuler</button>
        </a>
    </div>
</body>
</html>