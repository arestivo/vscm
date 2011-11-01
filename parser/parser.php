<?php


	function parser_get_html($user) {
		$html = file_get_contents('http://www.spoj.pl/status/'.$user.'/signedlist/');
		return $html;
	}

	function parser_get_table($html) {
	$TABLE_START = '|---------|---------------------|-----------|-----------|-------|--------|-----|';
	$TABLE_END = '\------------------------------------------------------------------------------/';
		$start = strpos($html, $TABLE_START);
		$html = substr($html, $start + strlen($TABLE_START) + 1);
		$end = strpos($html, $TABLE_END);
		$html = substr($html, 0, $end);
		return ($html);
	}

	function parser_get_rows($table) {
		$rows = explode("\n", $table);
		return $rows;
	}

	function parser_get_new($username, $lastid) {
		$prows = array();

		$html =	parser_get_html($username);
		$table = parser_get_table($html);
		$rows = parser_get_rows($table);
		foreach ($rows as $row) {
			if (trim($row)=='') continue;
			$fields = explode('|', $row);

			if ($lastid != null && (int)$fields[1] <= (int)$lastid) break;
			if (trim($fields[4]) == '??') break;
			if (is_numeric(trim($fields[4]))) $fields[4] = 'AC';
			$prows[] = array(
				'sid' => trim($fields[1]),
				'code' => trim($fields[3]),
				'result' => trim($fields[4]),
				'stamp' => trim($fields[2]),
				'language' => trim($fields[7])
			);
		}

		return $prows;
	}
?>
