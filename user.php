<?php
	require_once('smarty/Smarty.class.php');
	require_once('database/user.php');
	require_once('database/contest.php');
	require_once('database/problem.php');
	require_once ('database/refresh.php');
	date_default_timezone_set('Europe/Lisbon');

	$smarty = new Smarty;
	$db = new PDO('sqlite:database/vscm.db');

	$lastrefresh = file_get_contents('last_refresh');
	if ($lastrefresh == '' || $lastrefresh + 180 < time()) {
		$db->beginTransaction();
		refresh_user($_GET['username']);
		$db->commit();
	}

	$stats = user_getUserStats($_GET['username']);
	$problems = problem_userStats($_GET['username']);

	$smarty->assign('stats', $stats);
	$smarty->assign('problems', $problems);
	$smarty->assign('username', $_GET['username']);
	$smarty->display('user.tpl');
?>
