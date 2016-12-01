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
		echo "<div id=\"realTimeData\" data-page=\"Who's Online\"></div>\n";
	}
		
	// Top Intro
	echo "<article class=\"w3-theme-";
		if (isset($_SESSION['ld'])) {
			echo $_SESSION['ld'];
		} else {
			echo "l";
		}
	echo "2 w3-content\">\n";
		echo "<h1>Who's Online</h1>\n";
		echo "<p>These are the people who are currently using this site.</p>\n";
	echo "</article>\n";
	echo "<br />\n";

	// Who's Online
	try {
		$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
		echo "<article class=\"reload\">\n";
			echo "<table class=\"w3-table-all w3-large w3-responsive\">\n";
				echo "<thead>\n";
					echo "<tr class=\"w3-theme-";
						if (isset($_SESSION['ld'])) {
							echo $_SESSION['ld'];
						} else {
							echo "l";
						}
					echo "2\">\n";
						echo "<td><p>Name</p></td>\n";
						echo "<td><p>Location</p></td>\n";
					echo "</tr>\n";
				echo "</thead>\n";
				echo "<tbody>\n";
					$sql = "SELECT DisplayName,Color,CurrentPage,UserID FROM users WHERE CurrentTime>=". (time() - 60). " ORDER BY CurrentPage ASC;";
					$result = $connection->query($sql);
					foreach ($result as $row) {
						echo "<tr class=\"w3-theme-";
							if (isset($_SESSION['ld'])) {
								echo $_SESSION['ld'];
							} else {
								echo "l";
							}
						echo "1\">\n";
							echo "<td class=\"w3-dropdown-hover\"><button class=\"w3-btn w3-". $row['Color']. "\" onclick=\"requestFriend(". $row['UserID']. ")\"><p>". $row['DisplayName'];
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
