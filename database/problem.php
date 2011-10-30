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

	function problem_stats() {
		global $db;
		$stmt = $db->prepare('SELECT code,
			COUNT(CASE WHEN result = \'AC\' THEN 1 ELSE NULL END) AS accepted,
			COUNT(CASE WHEN result <> \'AC\' THEN 1 ELSE NULL END) AS failed 
			FROM submission GROUP BY code');
		$stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function problem_userStats($username) {
		global $db;
		$stmt = $db->prepare('SELECT code,
			COUNT(CASE WHEN result = \'AC\' THEN 1 ELSE NULL END) AS accepted,
			COUNT(CASE WHEN result <> \'AC\' THEN 1 ELSE NULL END) AS failed 
			FROM submission WHERE username = :username GROUP BY code');
		$stmt->bindParam(':username', $username);
		$stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function problem_datestats($username) {
		global $db;
		if ($username) $ufilter = ' WHERE username = :username '; else $ufilter = '';
		$stmt = $db->prepare('select strftime(\'%Y-%m\', stamp, \'unixepoch\') as d, 
			COUNT(*) AS submited,
			COUNT(CASE WHEN result = \'AC\' THEN 1 ELSE NULL END) AS accepted,
			COUNT(CASE WHEN result <> \'AC\' THEN 1 ELSE NULL END) AS failed 
			FROM submission ' . $ufilter . 'GROUP BY strftime(\'%Y-%m\', stamp, \'unixepoch\') ORDER BY d');
		if ($username) $stmt->bindParam(':username', $username);
		$stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$first = explode('-', $data[0]['d']);
		foreach ($data as $d) $last = explode('-',$d['d']);
		$year = (int)$first[0]; $month = (int)$first[1];
		while ($year < $last[0] || $year == $last[0] && $month <= $last[1]) {
			if ($month < 10) $month = '0' . $month;
			$stats["$year-$month"] = array(0,0,0);
			$month++;
			if ($month == 13) {$month = 1; $year++;}
		}
		foreach ($data as $d) $stats[$d['d']] = array((int)$d['submited'], (int)$d['accepted'], (int)$d['failed']);
		foreach ($stats as $y => $s) {
			$return[0][] = $y;
			$return[1][] = $s[0];
			$return[2][] = $s[1];
			$return[3][] = $s[2];
		}
		return $return;
	}

?>
