<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message de Commande Passée</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .message-container {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        .message-container h2 {
            margin: 0;
            font-size: 24px;
        }
        .message-container p {
            font-size: 16px;
            margin-top: 10px;
        }
        .message-container button {
            background-color: #ffffff;
            color: #4CAF50;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .message-container button:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="message-container">
        @can('passer commande')
        <h2>Echec dans la commande</h2>
        <p>Votre commande a été Annulé veuillez.Resseyer dans quelque minute</p>
        <button onclick="window.location.href='/';">Retour à l'accueil</button>
        @endcan
    </div>
</body>
</html>
