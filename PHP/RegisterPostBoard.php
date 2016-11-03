<?php
	if (isset($_GET['sid'])) {
		session_start($_GET['sid']);
	}
	if (isset($_SESSION['username'])) {
		try {
			include "db.php";
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "INSERT INTO postingBoards(Creator,Title) VALUES(\"". $_SESSION['username']. "\", \"". $_POST['title']. "\")";
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