<?php
require_once('dbcon.php');

$roomId = $_POST['roomId'];
$box = $_POST['box'];

$field = "box" . intval($box);

// Markeer box als opgelost
$stmt = $db_connection->prepare("UPDATE progress SET $field = 1 WHERE roomId = ?");
$stmt->execute([$roomId]);

// Check of alle boxen klaar zijn
$stmt = $db_connection->prepare("SELECT box1, box2, box3 FROM progress WHERE roomId = ?");
$stmt->execute([$roomId]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row['box1'] && $row['box2'] && $row['box3']) {
    $stmt = $db_connection->prepare("UPDATE progress SET finished = 1 WHERE roomId = ?");
    $stmt->execute([$roomId]);
}

echo "OK";
