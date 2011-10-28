<?php
	require_once('smarty/Smarty.class.php');
	require_once('database/user.php');
	require_once('database/problem.php');
	date_default_timezone_set('Europe/Lisbon');

	$smarty = new Smarty;
	$db = new PDO('sqlite:database/vscm.db');
        
	$lastrefresh = file_get_contents('last_refresh');
        if ($lastrefresh == '' || $lastrefresh + 600 < time()) {
           $db->beginTransaction();
           refresh_all();
           $db->commit();
           file_put_contents('last_refresh', time());
	}



	$stats = user_getStats();
	$problems = problem_stats();
	$smarty->assign('stats', $stats);
	$smarty->assign('problems', $problems);
	$smarty->display('index.tpl');

?>
