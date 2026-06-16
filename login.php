<?php
session_start();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Inloggen</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Inloggen</h2>

<form action="login_process.php" method="POST">
    <label>Gebruikersnaam:</label>
    <input type="text" name="username" required>

    <label>Wachtwoord:</label>
    <input type="password" name="password" required>

    <button type="submit">Inloggen</button>
</form>

<?php
if (isset($_GET['error'])) {
    echo "<p style='color:red;'>".$_GET['error']."</p>";
}
?>

</body>
</html>
