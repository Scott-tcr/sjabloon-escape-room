<?php
session_start();
require 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $db_connection->prepare("SELECT * FROM users WHERE username = :username");
    $query->bindParam(":username", $username);
    $query->execute();

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user'] = $user['username'];
        header("Location: index.php");
        exit;

    } else {
        header("Location: login.php?error=Onjuiste gegevens");
        exit;
    }
}
?>
