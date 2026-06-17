<?php
session_start();
require 'dbcon.php';

// Alleen admins
if (!isset($_SESSION['user']) || $_SESSION['is_admin'] != 1) {
    header("Location: auth.php");
    exit;
}

// Check ID
if (!isset($_GET['id'])) {
    header("Location: admin_list_questions.php?error=missing_id");
    exit;
}

$id = $_GET['id'];

// Haal vraag op
$stmt = $db_connection->prepare("SELECT * FROM questions WHERE id = :id");
$stmt->bindParam(":id", $id);
$stmt->execute();
$question = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$question) {
    header("Location: admin_list_questions.php?error=not_found");
    exit;
}

// Verwerken update
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $new_question = $_POST['question'];
    $new_answer = $_POST['answer'];
    $new_hint = $_POST['hint'];

    $update = $db_connection->prepare("
        UPDATE questions
        SET question = :question, answer = :answer, hint = :hint
        WHERE id = :id
    ");

    $update->bindParam(":question", $new_question);
    $update->bindParam(":answer", $new_answer);
    $update->bindParam(":hint", $new_hint);
    $update->bindParam(":id", $id);

    if ($update->execute()) {
        header("Location: admin_list_questions.php?updated=1");
        exit;
    } else {
        echo "Er ging iets mis bij het opslaan.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Vraag bewerken</title>

    <!-- Correcte CSS link -->
    <link rel="stylesheet" href="css/admin_edit_question.css">
</head>
<body>

<h2>Vraag bewerken</h2>

<form method="POST">
    <label>Vraag:</label>
    <input type="text" name="question" value="<?= htmlspecialchars($question['question']) ?>" required>

    <label>Antwoord:</label>
    <input type="text" name="answer" value="<?= htmlspecialchars($question['answer']) ?>" required>

    <label>Hint:</label>
    <textarea name="hint"><?= htmlspecialchars($question['hint']) ?></textarea>

    <button type="submit">Opslaan</button>
</form>

</body>
</html>

