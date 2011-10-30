<?php
	require_once('smarty/Smarty.class.php');
	require_once('database/user.php');
	require_once('database/problem.php');
	require_once('database/refresh.php');
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
	$smarty->assign('stats', $stats);
	$smarty->display('index.tpl');

?>
