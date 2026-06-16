<?php
require_once('../dbcon.php');

try {
    $stmt = $db_connection->query("SELECT * FROM riddles WHERE roomid = 2");
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

<form method="POST" action="rate.php">
    <input type="hidden" name="room" value="game">

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
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escape Room 2</title>

    <!-- Kamer 2 thema -->
    <link rel="stylesheet" href="../css/room2.css">

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

<body class="room2">

<h1>Escape Room 2</h1>
<p class="room2-subtitle">Los de raadsels op om verder te komen...</p>

<!-- TIMER -->
<div id="timer">03:00</div>

<!-- BOX GRID -->
<div class="room2-container">
    <div class="room2-box-grid">
        <?php foreach ($riddles as $index => $riddle): ?>
            <div class="room2-box"
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
<section class="room2-overlay" id="overlay" onclick="closeModal()"></section>

<!-- MODAL -->
<section class="room2-modal" id="modal">
    <h2>Escape Room Vraag</h2>
    <p id="riddle"></p>

    <input type="text" id="answer" placeholder="Typ je antwoord...">

    <button onclick="checkAnswer()">Verzenden</button>

    <p id="feedback" class="room2-feedback"></p>
</section>

<script src="../js/app.js"></script>

</body>
</html>
