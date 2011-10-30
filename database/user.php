<?php
	function user_getStats() {
		global $db;
		$stmt = $db->prepare(
			'SELECT realname, username, 
					COUNT(submission.sid) AS submissions,
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

?>
