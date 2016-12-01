<?php
	session_start();
	include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/Global/db.php";
	if ($_POST['username'] != "" && $_POST['password'] != "" && !isset($_SESSION['userid']) && !isset($_SESSION['username']) && !isset($_SESSION['displayName'])) {
		try {
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "SELECT Username,Password,Color,LD,DisplayName,UserID FROM users WHERE Username=\"". $_POST['username']. "\"";
			$result = $connection->query($sql);
			if ($connection->query($sql)->fetch()['Username'] == $_POST['username'] && $connection->query($sql)->fetch()['Password'] == hash("sha256", $_POST['password'])) {
				$_SESSION = array();
				$_SESSION['userid'] = $connection->query($sql)->fetch()['UserID'];
				$_SESSION['color'] = $connection->query($sql)->fetch()['Color'];
				$_SESSION['ld'] = $connection->query($sql)->fetch()['LD'];
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['displayName'] = $connection->query($sql)->fetch()['DisplayName'];
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
?>