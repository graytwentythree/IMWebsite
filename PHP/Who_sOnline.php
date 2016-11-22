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
		include "db.php";
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/PHP/header.php";
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/PHP/footer.php";
		if (isset($_SESSION['userid'])) {
			echo "<div id=\"realTimeData\" data-page=\"Who's Online\"></div>\n";
		}
	?>
	<?php
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/HTML/Who_sOnline.html";

		try {
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			echo "<article class=\"reload\">\n";
				echo "<table class=\"w3-table-all w3-large w3-responsive\">\n";
					echo "<thead>\n";
						echo "<tr>\n";
							echo "<td><p>Name</p></td>\n";
							echo "<td><p>Location</p></td>\n";
						echo "</tr>\n";
					echo "</thead>\n";
					echo "<tbody>\n";
						$sql = "SELECT DisplayName,CurrentPage,UserID FROM users WHERE CurrentTime>=". (time() - 60). " ORDER BY CurrentPage ASC;";
						$result = $connection->query($sql);
						foreach ($result as $row) {
							echo "<tr>\n";
								echo "<td class=\"w3-dropdown-hover\"><button class=\"w3-btn w3-theme-l1\" onclick=\"requestFriend(". $row['UserID']. ")\"><p>". $row['DisplayName'];
									echo "<div class=\"w3-dropdown-content w3-card-4\"><p>Click to request as friend</p></div>";
								echo "</p></button></td>\n";
								echo "<td><p>". $row['CurrentPage']. "<p></td>\n";
							echo "</tr>\n";
						}
					echo "</tbody>\n";
				echo "</table>\n";
			echo "</article>\n";
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	?>
	<br /><br /><br />
</body>
</html>
