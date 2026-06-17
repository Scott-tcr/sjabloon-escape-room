<?php
session_start();
require 'dbcon.php';

// Check admin
if (!isset($_SESSION['user']) || $_SESSION['is_admin'] != 1) {
    header("Location: auth.php");
    exit;
}

// Form verwerken
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

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vraag toevoegen</title>

    <!-- CSS uit de map /css/ -->
    <link rel="stylesheet" href="css/admin_add_question.css">
</head>

<body>

<h2>Nieuwe vraag toevoegen</h2>

<form method="POST">
    <label>Vraag:</label>
    <input type="text" name="question" required>

    <label>Antwoord:</label>
    <input type="text" name="answer" required>

    <label>Hint:</label>
    <textarea name="hint"></textarea>

    <button type="submit">Opslaan</button>
</form>

</body>
</html>
