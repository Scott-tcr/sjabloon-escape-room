<?php
session_start();
require "dbcon.php";


$team_id = $_GET['id'];

$users = $db_connection->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Teamleden toevoegen</h2>

<form action="insert_member.php" method="POST">
    <input type="hidden" name="team_id" value="<?= $team_id ?>">

    <label>Kies gebruiker:</label>
    <select name="user_id">
        <?php foreach ($users as $u): ?>
            <option value="<?= $u['id'] ?>"><?= $u['username'] ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Toevoegen</button>
</form>
