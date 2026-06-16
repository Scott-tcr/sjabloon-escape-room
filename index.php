<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: auth.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Escape Room - Dieren, Games & Planeten</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- 🔹 AUTH KNOPPEN RECHTSBOVEN -->
<div class="top-right-auth">
    <a href="view_teams.php" class="auth-btn login" style="margin-right: 10px;">Teams</a>
    <a href="logout.php" class="auth-btn logout">Uitloggen</a>
</div>

<header class="hero">
    <div class="hero-content">
        <h1>Escape Room Challenge</h1>
        <p>Kies een thema, los de raadsels op en ontsnap uit alle kamers!</p>
        <a href="#rooms" class="btn-primary">Start jouw avontuur</a>
    </div>
</header>

<main>
    <section id="rooms" class="rooms">
        <h2>Kies je kamer</h2>
        <p class="subtitle">Drie thema’s, drie uitdagingen. Waar begin jij?</p>

        <div class="room-grid">

            <article class="room-card">
                <img src="css/images/dieren.webp" alt="Dieren" class="room-img">
                <h3>Dierenkamer</h3>
                <p>Ontsnap uit de dierentuin door slimme dierenraadsels op te lossen.</p>
                <a href="rooms/room_1.php" class="btn-secondary">Speel Dieren</a>
            </article>

            <article class="room-card">
                <img src="css/images/gamen.webp" alt="Games" class="room-img">
                <h3>Gamekamer</h3>
                <p>Voor echte gamers: power-ups, levels en game-termen als raadsels.</p>
                <a href="rooms/room_2.php" class="btn-secondary">Speel Games</a>
            </article>

            <article class="room-card">
                <img src="planet.jpg" alt="Planeten" class="room-img">
                <h3>Planetenkamer</h3>
                <p>Reis door de ruimte en kraak de codes van ons zonnestelsel.</p>
                <a href="rooms/room_3.php" class="btn-secondary">Speel Planeten</a>
            </article>

        </div>
    </section>
</main>

<footer class="footer">
    <p>&copy; 2026 Escape Room Project – Gemaakt door Rico, Scott en Jimmy</p>
</footer>

</body>
</html>

