<?php
	include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/Global/db.php";
	session_start();
	if (isset($_SESSION['userid']) && isset($_POST['friendid']) && ($_SESSION['userid'] != $_POST['friendid'])) {
		try {
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "SELECT * FROM friends WHERE UserID=". $_SESSION['userid']. " AND FriendID=". $_POST['friendid']. "";
			if ($connection->query($sql)->fetch() == null) {
				$sql = "SELECT * FROM friendRequests WHERE UserID=". $_SESSION['userid']. " AND FriendID=". $_POST['friendid']. "";
				if ($connection->query($sql)->fetch() == null) {
					$sql = "INSERT INTO friendRequests(UserID, FriendID) VALUES(". $_SESSION['userid']. ", ". $_POST['friendid']. ")";
					$connection->exec($sql);
				}
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
?>