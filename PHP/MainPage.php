<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>IMWebsite</title>
	<link rel="stylesheet" type="text/css" href="../CSS/Reset.css" />
	<link rel="stylesheet" type="text/css" href="../CSS/Main.css" />
	<link rel="stylesheet" type="text/css" href="http://www.w3schools.com/lib/w3.css" />
	<link rel="stylesheet" type="text/css" href="http://www.w3schools.com/lib/w3-theme-orange.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript"> 
		window.jQuery || document.write('<script src="/jquery-1.9.1.min.js"><\/script>');
	</script>
	<script type="text/JavaScript" src="../JS/reloadPage.js"></script>
</head>
<body class="w3-theme-l3 w3-container">
	<?php
		session_start();
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/PHP/header.php";
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/PHP/footer.php";
		if (isset($_SESSION['userid'])) {
			echo "<div id=\"realTimeData\" data-page=\"Main Page\"></div>\n";
		}
	?>
	<?php
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/HTML/MainPage.html";
	?>
	<br /><br /><br />
</body>
</html>
