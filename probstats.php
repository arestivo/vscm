<?php
	$db = new PDO('sqlite:database/vscm.db');
	require_once('database/problem.php');

	if (isset($_GET['username'])) $username = $_GET['username']; else $username = null;
	if (isset($_GET['code'])) $code = $_GET['code']; else $code = null;
	$stats = problem_datestats($username, $code);

	echo json_encode($stats);
?>

