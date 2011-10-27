<?php
	require_once('smarty/Smarty.class.php');
	require_once('database/contest.php');
	date_default_timezone_set('Europe/Lisbon');

	$smarty = new Smarty;
	$db = new PDO('sqlite:database/vscm.db');

	$contests = contest_getAll();
	$smarty->assign('contests', $contests);
	$smarty->display('contests.tpl');
?>
