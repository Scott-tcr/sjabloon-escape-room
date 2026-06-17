<?php
session_start();
require 'dbcon.php';

// Check admin
if (!isset($_SESSION['user']) || $_SESSION['is_admin'] != 1) {
    header("Location: auth.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $hint = $_POST['hint'];

    $query = $db_connection->prepare("
        INSERT INTO questions (question, answer, hint)
        VALUES (:question, :answer, :hint)
    ");

    $query->bindParam(":question", $question);
    $query->bindParam(":answer", $answer);
    $query->bindParam(":hint", $hint);

    if ($query->execute()) {
        header("Location: admin_add_question.php?success=1");
        exit;
    } else {
        header("Location: admin_add_question.php?error=1");
        exit;
    }
}
?>
