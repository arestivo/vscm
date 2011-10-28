<?php
	require_once ('parser/parser.php');
	require_once ('database/problem.php');
	require_once ('database/user.php');
	require_once ('database/submission.php');

	function refresh_user($username) {
		$id = submission_getLast($username);
		$submissions = parser_get_new($username, $id);
		foreach($submissions as $s) {
			problem_add($s['code']);
			$s['stamp'] = strtotime($s['stamp'])-60*60;
			submission_add($s['sid'], $username, $s['code'], $s['stamp'], $s['language'], $s['result']);
		}
	}

	function refresh_all() {
		$users = user_getAll();
		foreach ($users as $user) {
			refresh_user($user['username']);
		}
	}
?>
