<?php
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    
    $host = "localhost";
    $dbname = "inlogproject_es";
    $username = "root";
    $password = "";

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    function toonData($email, $pdo) {
        $sql = "SELECT * FROM gebruiker WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function checkRol($email, $pdo) {
        $sql = "SELECT rolID FROM gebruiker WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($row) {
            $rolID = $row['rolID'];
            switch ($rolID) {
                case 1:
                    return "Gebruiker";
                case 2:
                    return "Admin";
                default:
                    return "Geen rol";
            }
        }
    
        return "Geen rol gevonden";
    }

    $userData = toonData($email, $pdo);
    if ($userData) {
        $rol = checkRol($email, $pdo);
        echo "Inloggegevens zijn correct" . "<br>";
        echo "Voornaam: " . $userData['voornaam'] . "<br>";
        echo "Achternaam: " . $userData['achternaam'] . "<br>";
        echo "Email: " . $userData['email'] . "<br>";
        echo "Rol: " . $rol . "<br>";

        if ($rol == "Admin") {
            echo '<body style="background-color: lightblue;">';
        } elseif ($rol == "Gebruiker") {
            echo '<body style="background-color: lightgreen;">';
        }
    }
} else {
    
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gegevens</title>
</head>
<body>
   

</body>
</html>
