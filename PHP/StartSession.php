<?php
	if ($_POST['username'] != "" && $_POST['password'] != "") {
		try {
			include "db.php";
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "SELECT Username FROM users WHERE Username=\"". $_POST['username']. "\"";
			$result = $connection->query($sql);
			echo $result->fetch()['Username'];
			if ($connection->query($sql)->fetch()['Username'] == $_POST['username']) {
				session_start();
				$_SESSION = array();
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['nickName'] = $_POST['username'];
				$_SESSION['password'] = $_POST['password'];
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