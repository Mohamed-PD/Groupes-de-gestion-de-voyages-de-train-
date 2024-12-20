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

// Vérifier si le paiement a été effectué
$paiement_effectue = isset($_SESSION['paiement_valide']) && $_SESSION['paiement_valide'] === true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation et Paiement</title>
    <link rel="stylesheet" href="acceuill22.css">
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

        .merchant-code {
            background: #e9f5e9;
            color: #4CAF50;
            font-weight: bold;
            font-size: 20px;
            border-radius: 5px;
            padding: 10px;
            margin: 20px 0;
            display: inline-block;
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
            cursor: pointer;
            transition: background 0.3s;
            border: none;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn-danger {
            background-color: #f44336;
        }

        .btn-danger:hover {
            background-color: #e53935;
        }

        .error {
            color: #f44336;
            margin-top: 10px;
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
        
        <div class="merchant-code">
            Code Marchand (WAAFI) : 5509
        </div>
        <p>Veuillez effectuer le paiement en utilisant le code marchand ci-dessus.</p>

        <!-- Si le paiement a été effectué -->
        <?php if ($paiement_effectue): ?>
            <a href="paiement2.php">
                <button class="btn">Confirmer la Réservation</button>
            </a>
        <?php else: ?>
            <!-- Sinon, bouton de paiement -->
            <a href="https://play.google.com/store/apps/details?id=com.safarifone.waafi&hl=fr&gl=US" target="_blank">
                <button class="btn">Effectuer le Paiement</button>
            </a>
        <?php endif; ?>

        <!-- Bouton pour annuler -->
        <a href="RR2.php">
            <button class="btn btn-danger">Annuler</button>
        </a>
    </div>
</body>
</html>
