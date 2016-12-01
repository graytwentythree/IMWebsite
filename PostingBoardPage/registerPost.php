<?php
	include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/Global/db.php";
	session_start();
	if (isset($_SESSION['username'])) {
		try {
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "INSERT INTO posts(Creator,Content,BoardID) VALUES(\"". $_SESSION['userid']. "\", \"". utf8_encode($_POST['post']). "\", ". $_POST['board']. ")";
			$connection->exec($sql);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
?>