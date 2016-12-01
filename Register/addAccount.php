<?php
	include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/Global/db.php";
	if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['vpassword']) && $_POST['password'] == $_POST['vpassword'] && isset($_POST['displayName'])) {
		try {
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "SELECT Username FROM users WHERE Username=\"". $_POST['username']. "\"";
			if ($connection->query($sql) == FALSE) {
				$sql = "INSERT INTO users(Username, Password, Color, LD, DisplayName) VALUES(\"". $_POST['username']. "\", \"". hash("sha256", $_POST['password']). "\", \"orange\", \"l\", \"". $_POST['displayName']. "\");";
				$connection->exec($sql);
			} else if ($connection->query($sql)->fetch()[0] == "") {
				$sql = "INSERT INTO users(Username, Password, Color, LD, DisplayName) VALUES(\"". $_POST['username']. "\", \"". hash("sha256", $_POST['password']). "\", \"orange\", \"l\", \"". $_POST['displayName']. "\");";
				$connection->exec($sql);
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
?>