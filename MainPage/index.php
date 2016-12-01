<!DOCTYPE html>
<html>
<head>
	<?php
		session_start();
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/Global/head.php";
	?>
</head>
<?php
	// Body
	echo "<body class=\"w3-theme-";
		if (isset($_SESSION['ld'])) {
			echo $_SESSION['ld'];
		} else {
			echo "l";
		}
	echo "3 w3-container\">";
	
	// Includes
	include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/Global/db.php";
	include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/Global/header.php";
	include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/Global/footer.php";
	if (isset($_SESSION['userid'])) {
		echo "<div id=\"realTimeData\" data-page=\"Main Page\"></div>\n";
	}
		
	// Top Intro
	echo "<article class=\"w3-theme-";
		if (isset($_SESSION['ld'])) {
			echo $_SESSION['ld'];
		} else {
			echo "l";
		}
	echo "2 w3-content\">\n";
		echo "<h1>Main Page</h1>\n";
		echo "<p>This is the main page (but it's not index.html!).</p>\n";
	echo "</article>\n";
?>
	<br /><br /><br />
</body>
</html>
