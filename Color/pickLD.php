<?php
	include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/Global/db.php";
	session_start();
	if (isset($_SESSION['userid']) && isset($_POST['ld'])) {
		try {
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "UPDATE users SET LD=\"". $_POST['ld']. "\" WHERE UserID=\"". $_SESSION['userid']. "\";";
			$connection->exec($sql);
			$_SESSION['ld'] = $_POST['ld'];
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
?>