<?php
	$db = new PDO('sqlite:database/vscm.db');
	require_once('database/problem.php');

	$stats = problem_datestats($_GET['username']);

	echo json_encode($stats);
?>

