<?php
	require_once('smarty/Smarty.class.php');
	require_once('database/user.php');
	require_once('database/problem.php');
	date_default_timezone_set('Europe/Lisbon');

	$smarty = new Smarty;
	$db = new PDO('sqlite:database/vscm.db');

	$stats = user_getStats();
	$problem = problem_stats();
	$smarty->assign('stats', $stats);
	$smarty->assign('problem', $problem);
	$smarty->display('index.tpl');

?>
