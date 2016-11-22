<?php
	if ($_POST['username'] != "" && $_POST['password'] != "") {
		try {
			include "db.php";
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "SELECT Username,Password,DisplayName,UserID FROM users WHERE Username=\"". $_POST['username']. "\"";
			$result = $connection->query($sql);
			if ($connection->query($sql)->fetch()['Username'] == $_POST['username'] && $connection->query($sql)->fetch()['Password'] == hash("sha256", $_POST['password'])) {
				session_start();
				$_SESSION = array();
				$_SESSION['userid'] = $connection->query($sql)->fetch()['UserID'];
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['displayName'] = $connection->query($sql)->fetch()['DisplayName'];
				header("Location: MainPage.php");
			} else {
				header("Location: Login.php");
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	} else {
		header("Location: Login.php");
	}
?>