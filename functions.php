<?php 
	function getDB () {
		static $db;

		if (!$db) {
			$config = require(__DIR__ . '/config.php');
	    	$connectionString = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=UTF8;', $config['host'], $config['port'], $config['dbname']);
	    	$db = new PDO($connectionString, $config['username'], $config['password'], [PDO::ATTR_PERSISTENT => true]);
			$db->query("SET NAMES utf8;");
		}
		return $db;
    }

    function query ($sql, $params = NULL) {
    	$db = getDB();

    	$stmt = $db->prepare($sql);
		$stmt->execute($params);
		
		return $stmt;
    } 

    function getRow($result) {
    	$rows = getRows($result);
    	return sizeof($rows) ? $rows[0] : NULL;
    }

    function string_replace($search, $replace, $subject) {
		$pattern = preg_quote($search);
		return preg_replace("/($pattern)/i", $replace, $subject);
    }
?>