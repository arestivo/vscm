<?php
	function problem_add($code) {
		global $db;
		$stmt = $db->prepare('SELECT * FROM problem WHERE code = :code');
		$stmt->bindParam(':code', $code);
		$stmt->execute();
		if ($stmt->fetch()) return;

		$stmt = $db->prepare('INSERT INTO problem VALUES(:code)');
		$stmt->bindParam(':code', $code);
		$stmt->execute();
	}

	function problem_getInContest($cid) {
		global $db;
		$stmt = $db->prepare('SELECT * FROM partof WHERE cid = :cid');
		$stmt->bindParam(':cid', $cid);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function problem_getSubmissionInContest($code, $username, $start, $stop) {
		global $db;
		$stmt = $db->prepare('SELECT * FROM submission WHERE code = :code AND username = :username AND stamp >= :start AND stamp <= :stop ORDER BY stamp ASC');
		$stmt->bindParam(':code', $code);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':start', $start);
		$stmt->bindParam(':stop', $stop);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);	
	}

?>
