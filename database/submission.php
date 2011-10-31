<?php
	function submission_getLast($user) {
		global $db;
		$stmt = $db->prepare('SELECT sid FROM submission WHERE username = :user ORDER BY sid DESC');
		$stmt->bindParam(':user', $user);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($result)==0) return null;
		return $result[0]['sid'];
	}

	function submission_getLastAll() {
		global $db;
		$stmt = $db->prepare('SELECT sid FROM submission ORDER BY sid DESC');
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($result)==0) return '-';
		return $result[0]['sid'];
	}

	function submission_add($sid, $username, $code, $stamp, $language, $result) {
		global $db;
		$stmt = $db->prepare('INSERT INTO submission VALUES(:sid, :username, :code, :stamp, :language, :result)');
		$stmt->bindParam(':sid', $sid);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':code', $code);
		$stmt->bindParam(':stamp', $stamp);
		$stmt->bindParam(':language', $language);
		$stmt->bindParam(':result', $result);
		$stmt->execute();
	}
?>
