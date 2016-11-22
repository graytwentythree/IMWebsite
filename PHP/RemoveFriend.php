<?php
	include "db.php";
	session_start();
	try {
		$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
		$sql = "SELECT * FROM friends WHERE UserID=". $_SESSION['userid']. " AND FriendID=". $_POST['friendid']. "";
		if ($connection->query($sql)->fetch() != null) {
			$sql = "DELETE FROM friends WHERE UserID=". $_SESSION['userid']. " AND FriendID=". $_POST['friendid'];
			$connection->exec($sql);
			$sql = "DELETE FROM friends WHERE UserID=". $_POST['friendid']. " AND FriendID=". $_SESSION['userid'];
			$connection->exec($sql);
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}
?>