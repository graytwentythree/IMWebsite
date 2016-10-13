<?php
	if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['vpassword']) && $_POST['password'] == $_POST['vpassword']) {
		try {
			include "db.php";
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "SELECT Username FROM users WHERE Username=". $_POST['username'];
			if ($connection->query($sql) == FALSE) {
				$sql = "INSERT INTO users(Username, Password) VALUES(\"". $_POST['username']. "\", \"". $_POST['password']. "\")";
				$connection->exec($sql);
			} else {
				header("Location: Register.php");
			}
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		header("Location: Login.php");
	} else {
		header("Location: Register.php");
	}
?>