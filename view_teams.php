<?php
session_start();
require "dbcon.php";

$teams = $db_connection->query("SELECT * FROM teams")->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Teams</h2>

<a href="create_team.php">Nieuw team maken</a>

<ul>
<?php foreach ($teams as $team): ?>
    <li>
        <?= $team['team_name'] ?> 
        <a href="delete_team.php?id=<?= $team['id'] ?>">Verwijderen</a>
        <a href="add_member.php?id=<?= $team['id'] ?>">Leden beheren</a>
    </li>
<?php endforeach; ?>
</ul>
