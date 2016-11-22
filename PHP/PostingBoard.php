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
			echo "<div id=\"realTimeData\" data-page=\"Posting Boards Home\"></div>\n";
		}
	?>
	<?php
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/HTML/PostingBoard.html";
		
		try {
		$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			echo "<table class=\"w3-table-all w3-large reload w3-responsive\">\n";
				echo "<thead>\n";
					echo "<tr>\n";
						echo "<td><p>Creator</p></td>\n";
						echo "<td><p>Title</p></td>\n";
					echo "</tr>\n";
				echo "</thead>\n";
				echo "<tbody>\n";
					$sql = "SELECT users.DisplayName,users.UserID,postingBoards.Title,postingBoards.BoardID,postingBoards.Private FROM postingBoards INNER JOIN users ON postingBoards.Creator=users.UserID LEFT JOIN friends ON users.UserID=friends.UserID WHERE postingBoards.Creator=". $_SESSION['userid']. " OR friends.FriendID=". $_SESSION['userid']. " OR postingBoards.Private=FALSE";
					$result = $connection->query($sql);
					foreach ($result as $row) {
						echo "<tr>\n";
							echo "<td class=\"w3-dropdown-hover\"><button class=\"w3-btn w3-theme-l1\" onclick=\"requestFriend(". $row['UserID']. ")\"><p>". $row['DisplayName'];
								echo "<div class=\"w3-dropdown-content w3-card-4\"><p>Click to request as friend</p></div>";
							echo "</p></button></td>\n";
							echo "<td><a href=\"PostingBoardPage.php?";
							echo "board=". $row['BoardID']. "\"><p>". $row['Title']. "</p></a></td>\n";
						echo "</tr>\n";
					}
				echo "</tbody>\n";
			echo "</table>\n";
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		
		if (isset($_SESSION['username'])) {
			echo "<form method=\"post\" action=\"RegisterPostBoard.php\">\n";
				echo "<fieldset>\n";
					echo "<legend>\n";
						echo "<h2 class=\"w3-container\">New Board</h2>\n";
					echo "</legend>\n";
					echo "<p>\n";
						echo "<input type=\"text\" name=\"title\" class=\"w3-input\" placeholder=\"Board Title\" />\n";
					echo "</p>\n";
					echo "<p>\n";
						echo "<input type=\"checkbox\" name=\"private\" /> Private board?\n";
					echo "</p>\n";
					echo "<p>\n";
						echo "<input type=\"submit\" value=\"Create New Board\"/>\n";
					echo "</p>\n";
				echo "</fieldset>\n";
			echo "</form>";
		} else {
			echo "<p>You must be signed in to create new boards.</p>\n";
		}
	?>
	<br /><br /><br />
</body>
</html>