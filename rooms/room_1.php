<?php
require_once('../dbcon.php');

try {
    $stmt = $db_connection->query("SELECT * FROM riddles WHERE roomid = 1");
    $riddles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Databasefout: " . $e->getMessage());
}


session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="nl">


<form method="POST" action="rate.php">
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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escape Room 1</title>

    <!-- Room 1 dieren thema -->
    <link rel="stylesheet" href="../css/room1.css">

    <style>
        #timer {
            font-size: 40px;
            font-weight: bold;
            color: #ff6b6b;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="room1">

<div class="room1-container">

    <h1>Escape Room 1</h1>
    <p class="room1-subtitle">Los de dierlijke raadsels op om te ontsnappen...</p>

    <!-- TIMER -->
    <div id="timer">03:00</div>

    <!-- BOX GRID -->
    <div class="room1-box-grid">
        <?php foreach ($riddles as $index => $riddle): ?>
            <div class="room1-box"
                onclick="openModal(<?php echo $index; ?>)"
                data-index="<?php echo $index; ?>"
                data-riddle="<?php echo htmlspecialchars($riddle['riddle']); ?>"
                data-answer="<?php echo htmlspecialchars($riddle['answer']); ?>">
                <h2>Box <?php echo $index + 1; ?></h2>
                <p>Klik om het raadsel te openen</p>
            </div>
        <?php endforeach; ?>
    </div>

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
