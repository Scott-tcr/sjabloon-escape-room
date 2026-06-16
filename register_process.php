<?php
session_start();
require 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check of gebruiker al bestaat
    $check = $db_connection->prepare("SELECT * FROM users WHERE username = :username");
    $check->bindParam(":username", $username);
    $check->execute();

    if ($check->rowCount() > 0) {
        header("Location: register.php?error=Gebruikersnaam bestaat al");
        exit;
    }

    // Hash wachtwoord
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    // Opslaan
    $insert = $db_connection->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $insert->bindParam(":username", $username);
    $insert->bindParam(":password", $hashed);
    $insert->execute();

    header("Location: register.php?success=1");
    exit;
}
?>
