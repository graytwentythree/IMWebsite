<?php
	include "db.php";
	if(isset($_GET['sid'])) {
		$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
		$sql = "UPDATE users SET SessionID=NULL WHERE SessionID=\"". $_GET['sid']. "\"";
		if (!$connection->exec($sql)) {
			die("Error ending session");
		}
		session_unset();
		unset($_GET['sid']);
	}
	header("Refresh: 0; url=MainPage.php");
?>