<?php
	include "db.php";
	include "FirePHPCore/fb.php";
	ob_start();
	session_start();
	try {
		if ($_POST['page'] == null) {
			fb("page is null");
		}
		if (date("Ymdhi") == null) {
			fb("date is null");
		}
		if ($_SESSION['userid'] == null) {
			fb("userid is null");
		}
		$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
		$sql = "UPDATE users SET CurrentPage=\"". $_POST['page']. "\",CurrentTime=". time(). " WHERE userid=\"". $_SESSION['userid']. "\";";
		fb($sql);
		fb($connection->exec($sql));
	} catch (PDOException $e) {
		die($e->getMessage());
	}
?>