<?php
	$db = new PDO('sqlite:database/vscm.db');
	require_once('database/problem.php');

	if (isset($_GET['username'])) $username = $_GET['username']; else $username = null;
	$stats = problem_datestats($username);

	echo json_encode($stats);
?>

