<?php
	if(isset($_GET['sid'])) {
		session_unset();
		unset($_GET['sid']);
	}
	header("Refresh: 3; url=MainPage.php");
?>