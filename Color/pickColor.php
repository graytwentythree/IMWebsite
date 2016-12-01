<?php
	include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/Global/db.php";
	session_start();
	if (isset($_SESSION['userid']) && isset($_POST['color'])) {
		try {
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "UPDATE users SET Color=\"". $_POST['color']. "\" WHERE UserID=\"". $_SESSION['userid']. "\";";
			$connection->exec($sql);
			$_SESSION['color'] = $_POST['color'];
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
?>