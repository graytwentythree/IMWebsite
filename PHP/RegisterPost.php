<?php
	session_start();
	if (isset($_SESSION['username'])) {
		try {
			include "db.php";
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "INSERT INTO posts(Creator,Content,BoardID) VALUES(\"". $_SESSION['userid']. "\", \"". utf8_encode($_POST['post']). "\", ". $_GET['board']. ")";
			if (!$connection->exec($sql)) {
				die("Error adding post");
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	} else {
		die("User not logged in!");
	}
	header("Location: ". $_SERVER['HTTP_REFERER']);
?>