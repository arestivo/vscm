<?php
	include ('database/refresh.php');

	$db = new PDO('sqlite:database/vscm.db');

	$lastrefresh = file_get_contents('last_refresh');
    if ($lastrefresh == '' || $lastrefresh + 180 < time()) {
		$db->beginTransaction();
		refresh_all();
		$db->commit();
		file_put_contents('last_refresh', time());
	}
	echo submission_getLastAll();
?>
