<?php
require "dbcon.php";


$team_id = $_POST['team_id'];
$user_id = $_POST['user_id'];

$insert = $db_connection->prepare("INSERT INTO team_members (team_id, user_id) VALUES (:t, :u)");
$insert->bindParam(":t", $team_id);
$insert->bindParam(":u", $user_id);
$insert->execute();

header("Location: view_teams.php");
exit;
