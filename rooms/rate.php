<?php

$conn = new mysqli("localhost", "root", "", "escaperoom1");

if ($conn->connect_error) {
    die("DB error: " . $conn->connect_error);
}

var_dump($_POST);

$room = $_POST['room'] ?? null;
$rating = $_POST['rating'] ?? null;

$stmt = $conn->prepare("INSERT INTO room_ratings (room_name, rating) VALUES (?, ?)");
$stmt->bind_param("si", $room, $rating);

if (!$stmt->execute()) {
    die("SQL error: " . $stmt->error);
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;