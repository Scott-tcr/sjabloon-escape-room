<?php
session_start();
require "../dbcon.php";

// Check login
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

$username = $_SESSION['user'];

// Haal user ID op
$stmt = $db_connection->prepare("SELECT id FROM users WHERE username = :u");
$stmt->bindParam(":u", $username);
$stmt->execute();
$user_id = $stmt->fetchColumn();

// Haal team op
$team_stmt = $db_connection->prepare("
    SELECT teams.team_name 
    FROM team_members 
    JOIN teams ON team_members.team_id = teams.id
    WHERE team_members.user_id = :id
");
$team_stmt->bindParam(":id", $user_id);
$team_stmt->execute();
$team_name = $team_stmt->fetchColumn();

// Haal riddles op
$stmt = $db_connection->query("SELECT * FROM riddles WHERE roomid = 1");
$riddles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escape Room 1</title>
    <link rel="stylesheet" href="../css/room1.css">
</head>

<body class="room1">

<div class="room1-container">

    <h1>Escape Room 1</h1>
    <p class="room1-subtitle">Los de dierlijke raadsels op om te ontsnappen...</p>

    <!-- ADMIN MENU -->
    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
        <div class="admin-menu">
            <h3> Admin Menu</h3>
            <a href="../admin_add_question.php" class="admin-btn">Vraag toevoegen</a>
            <a href="../admin_list_questions.php" class="admin-btn">Vragen beheren</a>
        </div>
    <?php endif; ?>

    <!-- TEAM INFO -->
    <p class="team-info">
        Je zit in team: <strong><?= $team_name ?: 'Geen team' ?></strong>
    </p>

    <!-- TIMER -->
    <div id="timer">03:00</div>

    <!-- BOX GRID -->
    <div class="room1-box-grid">
        <?php foreach ($riddles as $index => $riddle): ?>
            <div class="room1-box"
                onclick="openModal(<?= $index ?>)"
                data-index="<?= $index ?>"
                data-riddle="<?= htmlspecialchars($riddle['riddle']) ?>"
                data-answer="<?= htmlspecialchars($riddle['answer']) ?>">
                <h2>Box <?= $index + 1 ?></h2>
                <p>Klik om het raadsel te openen</p>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- RATING FORM -->
    <form method="POST" action="rate.php" class="rating-form">
        <input type="hidden" name="room" value="dieren">

        <label>Beoordeling:</label>
        <select name="rating">
            <option value="1">★ 1</option>
            <option value="2">★★ 2</option>
            <option value="3">★★★ 3</option>
            <option value="4">★★★★ 4</option>
            <option value="5">★★★★★ 5</option>
        </select>

        <button type="submit">Opslaan</button>
    </form>

</div>

<!-- OVERLAY -->
<section class="room1-overlay" id="overlay" onclick="closeModal()"></section>

<!-- MODAL -->
<section class="room1-modal" id="modal">
    <h2>Escape Room Vraag</h2>
    <p id="riddle"></p>

    <input type="text" id="answer" placeholder="Typ je antwoord...">

    <button onclick="checkAnswer()">Verzenden</button>

    <p id="feedback" class="room1-feedback"></p>
</section>

<script src="../js/app.js"></script>

</body>
</html>


