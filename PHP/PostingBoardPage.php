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
	?>
	<?php
		try {
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			$sql = "SELECT users.DisplayName,postingBoards.Title,postingBoards.BoardID FROM postingBoards INNER JOIN users ON postingBoards.Creator=users.UserID WHERE BoardID=". $_GET['board'];
			$result = $connection->query($sql)->fetch();
			
			if (isset($_SESSION['userid'])) {
				echo "<div id=\"realTimeData\" data-page=\"". $result['Title']. "\"></div>\n";
			}
			
			echo "<h1>". $result['Title']. "</h1>\n";
			echo "<h2>". $result['DisplayName']. "</h2>\n";
			
			echo "<table class=\"w3-table-all w3-large reload w3-responsive\">\n";
				echo "<thead>\n";
					echo "<tr>\n";
						echo "<td class=\"w3-col s3\"><p>Creator</p></td>\n";
						echo "<td class=\"w3-col s9\"><p>Post</p></td>\n";
					echo "</tr>\n";
				echo "</thead>\n";
				echo "<tbody>\n";
					$sql = "SELECT users.DisplayName,users.UserID,posts.Content FROM posts INNER JOIN users ON posts.Creator=users.UserID WHERE posts.BoardID=". $_GET['board'];
					$result = $connection->query($sql);
					foreach ($result as $row) {
						echo "<tr class=\"\">\n";
							echo "<td class=\"w3-dropdown-hover w3-col s3\"><button class=\"w3-btn w3-theme-l1\" onclick=\"requestFriend(". $row['UserID']. ")\"><p>". $row['DisplayName'];
								echo "<div class=\"w3-dropdown-content w3-card-4\"><p>Click to request as friend</p></div>";
							echo "</p></button></td>\n";
							echo "<td class=\"w3-col s9\"><p>". nl2br(utf8_decode($row['Content'])). "</p></td>\n";
						echo "</tr>\n";
					}
				echo "</tbody>\n";
			echo "</table>\n";
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		
		if (isset($_SESSION['username'])) {
			echo "<form method=\"post\" action=\"RegisterPost.php?board=". $_GET['board']. "&uri=". $_SERVER['REQUEST_URI']. "\">\n";
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
	?>
	<br /><br /><br />
</body>
</html>