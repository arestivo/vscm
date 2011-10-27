<?php
	include ('database/refresh.php');

	$db = new PDO('sqlite:database/vscm.db');

	$db->beginTransaction();
	refresh_all();
	$db->commit();
?>
