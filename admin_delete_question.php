<?php
session_start();
require 'dbcon.php';

// Alleen admins
if (!isset($_SESSION['user']) || $_SESSION['is_admin'] != 1) {
    header("Location: auth.php");
    exit;
}

// Check of ID bestaat
if (!isset($_GET['id'])) {
    header("Location: admin_list_questions.php?error=missing_id");
    exit;
}

$id = $_GET['id'];

// Verwijder vraag
$stmt = $db_connection->prepare("DELETE FROM questions WHERE id = :id");
$stmt->bindParam(":id", $id);

if ($stmt->execute()) {
    header("Location: admin_list_questions.php?deleted=1");
    exit;
} else {
    header("Location: admin_list_questions.php?error=delete_failed");
    exit;
}
?>
