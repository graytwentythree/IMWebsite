<?php
	include "db.php";
	if(isset($_SESSION['username'])) {
		session_unset();
	}
	header("Refresh: 0; url=MainPage.php");
?>