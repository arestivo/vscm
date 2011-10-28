<?php
	require_once('smarty/Smarty.class.php');
	require_once('database/user.php');
	date_default_timezone_set('Europe/Lisbon');

	$smarty = new Smarty;
	$db = new PDO('sqlite:database/vscm.db');

	$stats = user_getStats();
	$smarty->assign('stats', $stats);
	$smarty->display('index.tpl');

	print_r(problem_stats());
?>
