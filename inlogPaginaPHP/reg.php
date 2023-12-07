<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratie</title>
</head>
<body>
    <h1>Registratie</h1>
    <form method="POST" action="">
        <label for="voornaam">Voornaam:</label>
        <input type="text" id="voornaam" name="voornaam" required><br>

        <label for="achternaam">Achternaam:</label>
        <input type="text" id="achternaam" name="achternaam" required><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br>

        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="klas">Klas:</label>
        <input type="text" id="klas" name="klas" required><br>

        <input type="submit" value="Registreren">
    </form>
</body>
</html>