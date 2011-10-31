<?php
	function user_getStats() {
		global $db;
		$stmt = $db->prepare(
			'SELECT realname, username, 
					COUNT(submission.sid) AS submissions,
					COUNT(CASE WHEN result <> \'AC\' THEN 1 ELSE NULL END) AS failed,
					COUNT(CASE WHEN result = \'AC\' THEN 1 ELSE NULL END) AS accepted
			 FROM user LEFT JOIN 
				  submission USING(username) 
			 GROUP BY username');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function user_getUserStats($username) {
		global $db;
		$stmt = $db->prepare(
			'SELECT realname, username, 
					COUNT(submission.sid) AS submissions,
					COUNT(CASE WHEN result <> \'AC\' THEN 1 ELSE NULL END) AS failed,
					COUNT(CASE WHEN result = \'AC\' THEN 1 ELSE NULL END) AS accepted
			 FROM user LEFT JOIN 
				  submission USING(username) 
			 WHERE username = :username
			 GROUP BY username');
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
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
