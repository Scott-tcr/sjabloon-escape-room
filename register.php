<?php
session_start();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Registreren</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Account aanmaken</h2>

<form action="register_process.php" method="POST">
    <label>Gebruikersnaam:</label>
    <input type="text" name="username" required>

    <label>Wachtwoord:</label>
    <input type="password" name="password" required>

    <button type="submit">Registreren</button>
</form>

<?php
if (isset($_GET['error'])) {
    echo "<p style='color:red;'>".$_GET['error']."</p>";
}
if (isset($_GET['success'])) {
    echo "<p style='color:green;'>Account succesvol aangemaakt!</p>";
}
?>

</body>
</html>
