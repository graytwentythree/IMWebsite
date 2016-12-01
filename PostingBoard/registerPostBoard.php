<?php
	include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/Global/db.php";
	session_start();
	if (isset($_SESSION['username'])) {
		try {
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "INSERT INTO postingBoards(Creator,Title,Description,Private) VALUES(\"". $_SESSION['userid']. "\", \"". $_POST['title']. "\", \"". $_POST['description']. "\", ";
				if (isset($_POST['private']) && $_POST['private'] == "on") {
					$sql .= "TRUE";
				} else {
					$sql .= "FALSE";
				}
				$sql .= ")";
			$connection->exec($sql);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
?>