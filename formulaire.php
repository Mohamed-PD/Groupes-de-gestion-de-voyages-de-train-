<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Train</title>
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
        input[type="text"],
        input[type="number"] {
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
    <form action="ajouter_T.php" method="post">
    <h2>Ajouter un Train</h2>

    <!-- Champ ID du Train -->
    <label for="train_id">ID du Train</label>
    <input type="text" id="train_id" name="Modifier" maxlength="100" placeholder="Entrez l'ID du train" required>

    <!-- Champ Nom du Train -->
    <label for="nom_train">Nom du Train</label>
    <input type="text" id="nom_train" name="nom" maxlength="100" placeholder="Entrez le nom du train" required>

    <!-- Champ Type de Train -->
    <label for="type_train">Type de Train</label>
    <input type="text" id="type_train" name="type" maxlength="50" placeholder="Entrez le type du train">

    <!-- Champ Capacité -->
    <label for="capacite">Capacité</label>
    <input type="number" id="capacite" name="capacite" min="1" placeholder="Entrez la capacité" required>

    <!-- Champ Ville de départ -->
    <label for="villedep">Ville de départ</label>
    <input type="text" id="villedep" name="villedep" maxlength="100" placeholder="Entrez la ville de départ du train" required>

    <!-- Champ Ville d'arrivée -->
    <label for="villearr">Ville d'arrivée</label>
    <input type="text" id="villearr" name="villearr" maxlength="50" placeholder="Entrez la ville d'arrivée du train">

    <!-- Champ Siège -->
    <label for="siege">Siège</label>
    <input type="number" id="siege" name="siege" min="1" placeholder="Entrez le nombre de sièges" required>

    <!-- Bouton d'envoi -->
    <button type="submit">Soumettre</button>
</form>

</body>
</html>
