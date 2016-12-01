<?php
	include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/Global/db.php";
	session_start();
	if (isset($_POST['page']) && isset($_SESSION['userid'])) {
		try {
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "UPDATE users SET CurrentPage=\"". $_POST['page']. "\",CurrentTime=". time(). " WHERE userid=\"". $_SESSION['userid']. "\";";
			$connection->exec($sql);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
?>