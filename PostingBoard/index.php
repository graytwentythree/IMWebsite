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
			echo "<div id=\"realTimeData\" data-page=\"Posting Boards Home\"></div>\n";
		}
	
	// Top Intro
	echo "<article class=\"w3-theme-";
		if (isset($_SESSION['ld'])) {
			echo $_SESSION['ld'];
		} else {
			echo "l";
		}
	echo "2 w3-content\">\n";
		echo "<h1>Posting Board</h1>\n";
		echo "<p>You have reached the Posting Board!  YAY!</p>\n";
	echo "</article>\n";
	
	// Current Posting Boards
	echo "<br />\n";
	try {
	$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
		echo "<table class=\"w3-table-all w3-large reload w3-responsive\">\n";
			echo "<thead>\n";
				echo "<tr class=\"w3-theme-";
					if (isset($_SESSION['ld'])) {
						echo $_SESSION['ld'];
					} else {
						echo "l";
					}
				echo "2\">\n";
					echo "<td><p>Creator</p></td>\n";
					echo "<td><p>Title</p></td>\n";
					echo "<td><p>Description</p></td>\n";
				echo "</tr>\n";
			echo "</thead>\n";
			echo "<tbody>\n";
				$sql = "SELECT users.DisplayName,users.Color,users.UserID,postingBoards.Title,postingBoards.Description,postingBoards.BoardID,postingBoards.Private FROM postingBoards INNER JOIN users ON postingBoards.Creator=users.UserID LEFT JOIN friends ON users.UserID=friends.UserID WHERE postingBoards.Private=FALSE";
				if (isset($_SESSION['userid'])) {
					$sql .= " OR postingBoards.Creator=". $_SESSION['userid']. " OR friends.FriendID=". $_SESSION['userid'];
				}
				$sql .= " ORDER BY postingBoards.BoardID DESC;";
				$result = $connection->query($sql);
				if ($result != null) {
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
							echo "<td><a href=\"../PostingBoardPage?";
							echo "board=". $row['BoardID']. "\"><p>". $row['Title']. "</p></a></td>\n";
							echo "<td><p>". $row['Description']. "</p></td>\n";
						echo "</tr>\n";
					}
				}
			echo "</tbody>\n";
		echo "</table>\n";
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	
	// Create a Posting Board
	if (isset($_SESSION['username'])) {
		echo "<form id=\"postBoard\" action=\"registerPostBoard()\">\n";
			echo "<fieldset>\n";
				echo "<legend>\n";
					echo "<h2 class=\"w3-container\">New Board</h2>\n";
				echo "</legend>\n";
				echo "<p>\n";
					echo "<input type=\"text\" name=\"title\" class=\"w3-input\" placeholder=\"Board Title\" />\n";
				echo "</p>\n";
				echo "<p>\n";
					echo "<input type=\"text\" name=\"description\" class=\"w3-input\" placeholder=\"Board Description\" />\n";
				echo "</p>\n";
				echo "<p>\n";
					echo "<input type=\"checkbox\" name=\"private\" /> Private board?\n";
				echo "</p>\n";
				echo "<p>\n";
					echo "<button class=\"w3-btn\" onclick=\"registerPostBoard()\">Create New Board</button>";
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