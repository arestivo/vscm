<?php
	$db = new PDO('sqlite:database/vscm.db');
	require_once('database/problem.php');

	$stats = problem_datestats();

	echo json_encode($stats);
?>

