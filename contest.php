<?php
	require_once('smarty/Smarty.class.php');
	require_once('database/user.php');
	require_once('database/contest.php');
	require_once('database/problem.php');
	require_once ('database/refresh.php');
	date_default_timezone_set('Europe/Lisbon');

	$smarty = new Smarty;
	$db = new PDO('sqlite:database/vscm.db');

	$contest = contest_get($_GET['cid']);

	function getTime($interval) {
		$minutes = (int)($interval / 60);
		$seconds = $interval % 60;
		$hours = (int)($minutes / 60);
		$minutes = $minutes % 60;;
		if ($minutes < 10) $minutes = '0' . $minutes;
		if ($seconds < 10) $seconds = '0' . $seconds;
		return $hours . ':' . $minutes . ':' . $seconds;
	}


	$users = user_getInContest($_GET['cid']);
	$problems = problem_getInContest($_GET['cid']);

	if ($contest['start'] > time()) die('Not started');

	foreach ($users as $uid => $user) {
		$solved = 0; $total = 0;
		foreach ($problems as $pid => $problem) {
			$submissions = problem_getSubmissionInContest(
				$problem['code'], 
				$user['username'], 
				$contest['start'], 
				$contest['stop']
			);
			$state = 'NS'; $fails = 0; $time = 0; $dtime = "0:00:00";
			foreach ($submissions as $submission) {
				$state = $submission['result'];
				if ($submission['result'] == 'AC') {
					$time = $submission['stamp'] - $contest['start'] + $fails * 20 * 60;
					$dtime = getTime($submission['stamp'] - $contest['start']);
					$solved++; $total += $time;
					break;
				}
				$fails++; 
			}
			$users[$uid]['problems'][] = array('code' => $problem['code'], 'state' => $state, 'fails' => $fails, 'time' => $dtime);
		}
		$users[$uid]['solved'] = $solved;
		$users[$uid]['total'] = getTime($total);
		$users[$uid]['utotal'] = $total;
	}

	function cmp($a, $b) {
		if ($a['solved'] == $b['solved']) return $a['utotal'] > $b['utotal'];
		return ($a['solved'] < $b['solved']);
	}
	
	usort($users, "cmp");

	$smarty->assign('contest', $contest);
	$smarty->assign('users', $users);
	$smarty->assign('problems', $problems);
	$smarty->display('contest.tpl');
?>
