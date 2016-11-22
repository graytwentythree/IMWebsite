<?php
	if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['vpassword']) && $_POST['password'] == $_POST['vpassword'] && isset($_POST['displayName'])) {
		try {
			include "db.php";
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "SELECT Username FROM users WHERE Username=\"". $_POST['username']. "\"";
			if ($connection->query($sql) == FALSE) {
				$sql = "INSERT INTO users(Username, Password, DisplayName) VALUES(\"". $_POST['username']. "\", \"". hash("sha256", $_POST['password']). "\", \"". $_POST['displayName']. "\");";
				$connection->exec($sql);
				header("Location: Login.php");
			} else if ($connection->query($sql)->fetch()[0] == "") {
				$sql = "INSERT INTO users(Username, Password, DisplayName) VALUES(\"". $_POST['username']. "\", \"". hash("sha256", $_POST['password']). "\", \"". $_POST['displayName']. "\");";
				$connection->exec($sql);
				header("Location: Login.php");
			} else {
				header("Location: Register.php");
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	} else {
		header("Location: Register.php");
	}
?>