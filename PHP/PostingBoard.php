<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>IMWebsite</title>
	<link rel="stylesheet" type="text/css" href="../CSS/Reset.css" />
	<link rel="stylesheet" type="text/css" href="../CSS/Main.css" />
	<link rel="stylesheet" type="text/css" href="http://www.w3schools.com/lib/w3.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript"> 
		window.jQuery || document.write('<script src="/jquery-1.9.1.min.js"><\/script>');
	</script>
	<script type="text/JavaScript" src="../JS/reloadPage.js"></script>
</head>
<body>
	<?php
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/PHP/header.php";
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/HTML/PostingBoard.html";
		
		echo "<noscript>Your browser does not support JavaScript.  Without JavaScript you will not be able to see posts or posting boards in real time.</noscript>";
		
		include "db.php";
		$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
		echo "<table>\n";
			echo "<thead>\n";
				echo "<tr>\n";
					echo "<td><p>Creator</p></td>\n";
					echo "<td><p>Title</p></td>\n";
				echo "</tr>\n";
			echo "</thead>\n";
			echo "<tbody>\n";
				$sql = "SELECT Creator,Title,BoardID FROM postingBoards";
				$result = $connection->query($sql);
				foreach ($result as $row) {
					echo "<tr>\n";
						echo "<td><p>". $row['Creator']. "</p></td>\n";
						echo "<td><a href=\"PostingBoardPage.php?";
						if (isset($_GET['sid'])) {
							echo "sid=". $_GET['sid']. "&";
						}
						echo "board=". $row['BoardID']. "\"><p>". $row['Title']. "</p></a></td>\n";
					echo "</tr>\n";
				}
			echo "</tbody>\n";
		echo "</table>\n";
		
		if (isset($_GET['sid'])) {
			echo "<form method=\"post\" action=\"RegisterPostBoard.php?sid=". $_GET['sid']. "\">\n";
				echo "<fieldset>\n";
					echo "<legend>\n";
						echo "<h2 class=\"w3-container\">New Board</h2>\n";
					echo "</legend>\n";
					echo "<p>\n";
						echo "<input type=\"text\" name=\"title\" class=\"w3-input\" placeholder=\"Board Title\" />\n";
					echo "</p>\n";
					echo "<p>\n";
						echo "<input type=\"submit\" value=\"Create New Board\"/>\n";
					echo "</p>\n";
				echo "</fieldset>\n";
			echo "</form>";
		} else {
			echo "<p>You must be signed in to create new boards.</p>\n";
		}
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/PHP/footer.php";
	?>
</body>
</html>