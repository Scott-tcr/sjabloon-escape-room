<?php
session_start();
require "dbcon.php";


$team_name = $_POST['team_name'];
$user = $_SESSION['user'];

// Haal user ID op
$stmt = $db_connection->prepare("SELECT id FROM users WHERE username = :u");
$stmt->bindParam(":u", $user);
$stmt->execute();
$user_id = $stmt->fetchColumn();

// Team opslaan
$insert = $db_connection->prepare("INSERT INTO teams (team_name, created_by) VALUES (:t, :u)");
$insert->bindParam(":t", $team_name);
$insert->bindParam(":u", $user_id);
$insert->execute();

header("Location: view_teams.php");
exit;
