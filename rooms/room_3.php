<?php
require_once('../dbcon.php');

try {
    $stmt = $db_connection->query("SELECT * FROM riddles WHERE roomid = 3");
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

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escape Room 3</title>

    <!-- Kamer 3 jungle thema -->
    <link rel="stylesheet" href="../css/room3.css">

    <style>
        #timer {
            font-size: 40px;
            font-weight: bold;
            color: #2ecc71;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="room3">

<h1>Escape Room 3</h1>
<p class="room3-subtitle">Los de natuur‑raadsels op om te ontsnappen...</p>

<!-- TIMER -->
<div id="timer">03:00</div>

<!-- BOX GRID -->
<div class="room3-container">
    <div class="room3-box-grid">
        <?php foreach ($riddles as $index => $riddle): ?>
            <div class="room3-box"
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
<section class="room3-overlay" id="overlay" onclick="closeModal()"></section>

<!-- MODAL -->
<section class="room3-modal" id="modal">
    <h2>Escape Room Vraag</h2>
    <p id="riddle"></p>

    <input type="text" id="answer" placeholder="Typ je antwoord...">

    <button onclick="checkAnswer()">Verzenden</button>

    <p id="feedback" class="room3-feedback"></p>
</section>

<script src="../js/app.js"></script>

</body>
</html>
