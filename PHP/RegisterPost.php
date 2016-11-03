<?php
	if (isset($_GET['sid'])) {
		session_start($_GET['sid']);
	}
	if (isset($_SESSION['username'])) {
		try {
			include "db.php";
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "INSERT INTO posts(Username,Content,BoardID) VALUES(\"". $_SESSION['username']. "\", \"". $_POST['post']. "\", ". $_GET['board']. ")";
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