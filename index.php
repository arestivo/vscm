<?php
	require_once('smarty/Smarty.class.php');
	require_once('database/user.php');
	require_once('database/problem.php');
	require_once('database/refresh.php');
	date_default_timezone_set('Europe/Lisbon');

	$smarty = new Smarty;
	$db = new PDO('sqlite:database/vscm.db');
        
	$stats = user_getStats();
	$solved = user_getSolved();
	$solved_weekly = user_getSolvedWeekly();
	foreach ($stats as $s) $merged[$s['username']] = $s;
	foreach ($solved as $s) $merged[$s['username']] = array_merge($merged[$s['username']], $s);
	foreach ($solved_weekly as $s) $merged[$s['username']] = array_merge($merged[$s['username']], $s);
	$smarty->assign('stats', $merged);
	$smarty->display('index.tpl');
?>
