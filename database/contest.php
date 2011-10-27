<?php
	function contest_getAll() {
		global $db;
		$stmt = $db->prepare('SELECT * FROM contest ORDER BY start DESC');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	function contest_get($cid) {
		global $db;
		$stmt = $db->prepare('SELECT * FROM contest WHERE cid = :cid');
		$stmt->bindParam(':cid', $cid);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

?>
