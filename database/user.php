<?php
	function user_getStats() {
		global $db;
		$week = strtotime('-1 week');
		$stmt = $db->prepare(
			'SELECT realname, username, 
					COUNT(submission.sid) AS submissions,
					COUNT(CASE WHEN stamp > '.$week.' THEN 1 ELSE NULL END) AS submissions_weekly,
					COUNT(CASE WHEN result <> \'AC\' THEN 1 ELSE NULL END) AS failed,
					COUNT(CASE WHEN result = \'AC\' THEN 1 ELSE NULL END) AS accepted,
					COUNT(CASE WHEN stamp > '.$week.' AND result = \'AC\' THEN 1 ELSE NULL END) AS accepted_weekly
			 FROM user LEFT JOIN 
				  submission USING(username) 
			 GROUP BY username');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function user_getUserStats($username) {
		global $db;
		$week = strtotime('-1 week');
		$stmt = $db->prepare(
			'SELECT realname, username, 
					COUNT(submission.sid) AS submissions,
					COUNT(CASE WHEN stamp > '.$week.' THEN 1 ELSE NULL END) AS submissions_weekly,
					COUNT(CASE WHEN result <> \'AC\' THEN 1 ELSE NULL END) AS failed,
					COUNT(CASE WHEN result = \'AC\' THEN 1 ELSE NULL END) AS accepted,
					COUNT(CASE WHEN stamp > '.$week.' AND result = \'AC\' THEN 1 ELSE NULL END) AS accepted_weekly
			 FROM user LEFT JOIN 
				  submission USING(username) 
			 WHERE username = :username
			 GROUP BY username');
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	function user_getSolved() {
		global $db;
		$stmt = $db->prepare('SELECT username, COUNT(code) AS solved FROM user LEFT JOIN (
			SELECT DISTINCT username, code
				FROM user LEFT JOIN submission USING(username) 
			 WHERE result = \'AC\') USING (username)
			 GROUP BY username');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function user_getSolvedWeekly() {
		global $db;
		$week = strtotime('-1 week');
		$stmt = $db->prepare('SELECT username, COUNT(code) AS solved_weekly FROM user LEFT JOIN (
			SELECT username, code
				FROM user LEFT JOIN submission USING(username) 
			 WHERE result = \'AC\' GROUP BY username, code HAVING MAX (stamp) > '.$week.' ) USING (username)
			 GROUP BY username');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function user_getAll() {
		global $db;
		$stmt = $db->prepare('SELECT * FROM user');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function user_getInContest($cid) {
		global $db;
		$stmt = $db->prepare('SELECT * FROM user JOIN participation USING (username) WHERE cid = :cid');
		$stmt->bindParam(':cid', $cid);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function user_getSolvedProblem($code) {
		global $db;
		$stmt = $db->prepare('SELECT DISTINCT user.* FROM user JOIN submission USING (username) WHERE code = :code AND result = \'AC\'');
		$stmt->bindParam(':code', $code);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);			
	}

	function user_getFailedProblem($code) {
		global $db;
		$stmt = $db->prepare('SELECT DISTINCT user.* FROM user JOIN submission USING (username) WHERE code = :code AND username NOT IN (SELECT username FROM submission WHERE code = :code AND result = \'AC\')');
		$stmt->bindParam(':code', $code);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);			
	}

	function user_getNotTriedProblem($code) {
		global $db;
		$stmt = $db->prepare('SELECT DISTINCT user.* FROM user WHERE username NOT IN (SELECT username FROM submission WHERE code = :code)');
		$stmt->bindParam(':code', $code);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);			
	}

?>
