<?php
require "dbcon.php";


$id = $_GET['id'];

$delete = $db_connection->prepare("DELETE FROM teams WHERE id = :id");
$delete->bindParam(":id", $id);
$delete->execute();

header("Location: view_teams.php");
exit;
