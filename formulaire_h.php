<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Horaires de Train</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="datetime-local"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <form action="ajouter_H.php" method="post">
        <h2>Ajouter  Horaires de Train</h2>
         <!-- Champ ID horaire -->
         <label for="id">ID Horaire</label>
        <input type="number" id="id" name="id" required>

        <!-- Champ ID (automatique, caché) -->
        <input type="hidden" name="horaire_id">

        <!-- Champ Train ID -->
        <label for="train_id">Train</label>
        <select id="train_id" name="train" required>
        <?php
        // Récupérer les données de la base de données pour les gares
        $server = 'localhost';
        $utilisateur = 'root';
        $motpasse = '';
        $base = 'gestion_train';
        $connection = mysqli_connect($server, $utilisateur, $motpasse, $base);
        $sql = "SELECT train_id FROM trains";
        $result = mysqli_query($connection, $sql);

        while ($row = mysqli_fetch_row($result)) {
            echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
        }

        mysqli_close($connection);
        ?>
    </select>

        <!-- Champ Gare ID -->
        <label for="gare_id">Gare</label>
        <select id="gare_id" name="gare" required>
        <?php
        // Récupérer les données de la base de données pour les gares
        $server = 'localhost';
        $utilisateur = 'root';
        $motpasse = '';
        $base = 'gestion_train';
        $connection = mysqli_connect($server, $utilisateur, $motpasse, $base);
        $sql = "SELECT gare_id FROM gares";
        $result = mysqli_query($connection, $sql);

        while ($row = mysqli_fetch_row($result)) {
            echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
        }

        mysqli_close($connection);
        ?>
    </select>

        <!-- Champ Arrivée -->
        <label for="arrivee">Heure d'arrivée</label>
        <input type="datetime-local" id="arrivee" name="arrivee" required>

        <!-- Champ Départ -->
        <label for="depart">Heure de départ</label>
        <input type="datetime-local" id="depart" name="depart" required>

        <!-- Champ Date -->
        <label for="date">Date</label>
        <input type="date" id="date" name="date" required>

        <!-- Bouton d'envoi -->
        <button type="submit">Soumettre</button>
    </form>
</body>
</html>