<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../auth.php");
    exit;
}
?>

<form action="insert_team.php" method="POST">
    <label>Teamnaam:</label>
    <input type="text" name="team_name" required>

    <button type="submit">Team aanmaken</button>
</form>
