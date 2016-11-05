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
		
		include "db.php";
		$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
		$sql = "SELECT Creator,Title,BoardID FROM postingBoards WHERE BoardID=". $_GET['board'];
		$result = $connection->query($sql)->fetch();
		echo "<h1>". $result['Title']. "</h1>\n";
		echo "<h2>". $result['Creator']. "</h2>\n";
		
		echo "<noscript>Your browser does not support JavaScript.  Without JavaScript you will not be able to see posts or posting boards in real time.</noscript>";
		
		echo "<table>\n";
			echo "<thead>\n";
				echo "<tr>\n";
					echo "<td><p>Creator</p></td>\n";
					echo "<td><p>Title</p></td>\n";
				echo "</tr>\n";
			echo "</thead>\n";
			echo "<tbody class=\"postTableBody\">\n";
				$sql = "SELECT users.DisplayName,posts.Content FROM posts INNER JOIN users ON posts.Username=users.Username WHERE posts.BoardID=". $_GET['board'];
				$result = $connection->query($sql);
				foreach ($result as $row) {
					echo "<tr>\n";
						echo "<td><p>". $row['DisplayName']. ": </p></td>\n";
						echo "<td><p>". $row['Content']. "</p></td>\n";
					echo "</tr>\n";
				}
			echo "</tbody>\n";
		echo "</table>\n";
		
		if (isset($_GET['sid'])) {
			echo "<form method=\"post\" action=\"RegisterPost.php?sid=". $_GET['sid']. "&board=". $_GET['board']. "&uri=". $_SERVER['REQUEST_URI']. "\">\n";
				echo "<fieldset>\n";
					echo "<legend>\n";
						echo "<h2 class=\"w3-container\">Post</h2>\n";
					echo "</legend>\n";
					echo "<p>\n";
						echo "<textarea name=\"post\" class=\"w3-input\" placeholder=\"Post Here\"></textarea>\n";
					echo "</p>\n";
					echo "<p>\n";
						echo "<input type=\"submit\" value=\"Post\"/>\n";
					echo "</p>\n";
				echo "</fieldset>\n";
			echo "</form>";
		} else {
			echo "<p>You must be signed in to post.</p>\n";
		}
		
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/PHP/footer.php";
	?>
</body>
</html>