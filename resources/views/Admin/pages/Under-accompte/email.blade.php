<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse de mail</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

header h1 {
    margin: 0;
}

main {
    padding: 20px;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
}

.highlight {
    font-weight: bold;
}

</style>
<body>
    <header>
        <h1>WholeOrder</h1>
    </header>
    <main>
        <!-- Contenu de votre email ici -->
        <p>Hello Mrs/Mme <span class="highlight">{{ $details['name'] }}</span>,</p>
        <p>Your WholeOrder account has been successfully created. Here is your login information:</p>
        <ul>
            <li><span class="highlight">Email:</span> {{ $details['email'] }}</li>
            <li><span class="highlight">Password:</span> {{ $details['password'] }}</li>
        </ul>
        <p>If you were not expecting to receive this message, please do not respond to it and ignore this message as responding may result in legal consequences.</p>
    </main>
    <footer>
        <p>&copy; 2024 WholeOrder. Tous droits réservés.</p>
    </footer>
</body>
</html>
