<?php
	if ($_POST['username'] != "" && $_POST['password'] != "") {
		try {
			include "db.php";
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "SELECT Username,Password,DisplayName FROM users WHERE Username=\"". $_POST['username']. "\"";
			$result = $connection->query($sql);
			if ($connection->query($sql)->fetch()['Username'] == $_POST['username'] && $connection->query($sql)->fetch()['Password'] == $_POST['password']) {
				session_start();
				$_SESSION = array();
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['displayName'] = $connection->query($sql)->fetch()['DisplayName'];
				$sql = "UPDATE users SET SessionID=\"". session_id(). "\" WHERE Username=\"". $_SESSION['username']. "\";";
				if (!$connection->exec($sql)) {
					session_unset();
					die("Could not start session properly!");
				}
				header("Location: MainPage.php?sid=". session_id());
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