<?php
	require_once('smarty/Smarty.class.php');
	require_once('database/user.php');
	require_once('database/contest.php');
	require_once('database/problem.php');
	require_once ('database/refresh.php');
	date_default_timezone_set('Europe/Lisbon');

	$smarty = new Smarty;
	$db = new PDO('sqlite:database/vscm.db');

	$stats = user_getUserStats($_GET['username']);
	$pstats = problem_userStats($_GET['username']);
	$solved = problem_numberUsersSolved();

	foreach ($pstats as $s) {
		$problems[$s['code']]['code'] = $s['code'];
		$problems[$s['code']]['accepted'] = $s['accepted'];
		$problems[$s['code']]['failed'] = $s['failed'];
		$problems[$s['code']]['solved'] = 0;
	}
	foreach ($solved as $s)
		if (isset($problems[$s['code']])) $problems[$s['code']]['solved'] = $s['solved'];

	$smarty->assign('stats', $stats);
	$smarty->assign('problems', $problems);
	$smarty->assign('username', $_GET['username']);
	$smarty->display('user.tpl');
?>
