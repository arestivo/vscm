<?php
	require_once('smarty/Smarty.class.php');
	require_once('database/user.php');
	require_once('database/problem.php');
	require_once('database/refresh.php');
	date_default_timezone_set('Europe/Lisbon');

	$smarty = new Smarty;
	$db = new PDO('sqlite:database/vscm.db');
        
	$solved = problem_numberUsersSolved();
	$stats = problem_stats();

	foreach ($stats as $s) {
		$problems[$s['code']]['code'] = $s['code'];
		$problems[$s['code']]['accepted'] = $s['accepted'];
		$problems[$s['code']]['failed'] = $s['failed'];
		$problems[$s['code']]['solved'] = 0;
	}
	foreach ($solved as $s)
		$problems[$s['code']]['solved'] = $s['solved'];

	$smarty->assign('problems', $problems);
	$smarty->display('problems.tpl');

?>
