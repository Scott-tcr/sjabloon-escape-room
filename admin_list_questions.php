<?php
session_start();
require 'dbcon.php';

// Alleen admins
if (!isset($_SESSION['user']) || $_SESSION['is_admin'] != 1) {
    header("Location: auth.php");
    exit;
}

// Haal alle vragen op
$stmt = $db_connection->query("SELECT * FROM questions ORDER BY id DESC");
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Vragen beheren</title>
    <link rel="stylesheet" href="css/admin_list_question.css">
</head>
<body>

<h2>Vragen beheren</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Vraag</th>
        <th>Antwoord</th>
        <th>Hint</th>
        <th>Acties</th>
    </tr>

    <?php foreach ($questions as $q): ?>
        <tr>
            <td><?= $q['id'] ?></td>
            <td><?= htmlspecialchars($q['question']) ?></td>
            <td><?= htmlspecialchars($q['answer']) ?></td>
            <td><?= htmlspecialchars($q['hint']) ?></td>
            <td>
                <a href="admin_edit_question.php?id=<?= $q['id'] ?>">Bewerken</a> |
                <a href="admin_delete_question.php?id=<?= $q['id'] ?>"
                   onclick="return confirm('Weet je zeker dat je deze vraag wilt verwijderen?');">
                     Verwijderen
                </a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>

