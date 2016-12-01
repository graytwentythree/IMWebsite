<?php
	session_start();
	if(isset($_SESSION['userid'])) {
		unset($_SESSION['userid']);
	}
	if(isset($_SESSION['username'])) {
		unset($_SESSION['username']);
	}
	if(isset($_SESSION['displayName'])) {
		unset($_SESSION['displayName']);
	}
	session_destroy();
	session_unset();
?>