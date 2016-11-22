<?php
	session_start();
	if (isset($_SESSION['username'])) {
		try {
			include "db.php";
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "INSERT INTO postingBoards(Creator,Title,Private) VALUES(\"". $_SESSION['userid']. "\", \"". $_POST['title']. "\", ";
				if ($_POST['private'] == "on") {
					$sql .= "TRUE";
				} else {
					$ql .= "FALSE";
				}
				$sql .= ")";
			if (!$connection->exec($sql)) {
				die("Error adding board");
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	} else {
		die("User not logged in!");
	}
	header("Location: ". $_SERVER['HTTP_REFERER']);
?>