<?php
	require_once('smarty/Smarty.class.php');
	require_once('database/user.php');
	require_once('database/problem.php');
	date_default_timezone_set('Europe/Lisbon');

	$smarty = new Smarty;
	$db = new PDO('sqlite:database/vscm.db');
        
	$code = $_GET['code'];

	$usersS = user_getSolvedProblem($code);
	$usersF = user_getFailedProblem($code);
	$usersN = user_getNotTriedProblem($code);

	$smarty->assign('usersS', $usersS);
	$smarty->assign('usersF', $usersF);
	$smarty->assign('usersN', $usersN);
	$smarty->assign('code', $code);

	$smarty->display('problem.tpl');
?>
