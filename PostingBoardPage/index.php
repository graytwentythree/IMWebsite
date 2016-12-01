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
	try {
		$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
		$sql = "SELECT users.DisplayName,postingBoards.Title,postingBoards.BoardID FROM postingBoards INNER JOIN users ON postingBoards.Creator=users.UserID WHERE BoardID=". $_GET['board'];
		$result = $connection->query($sql)->fetch();
		
		if (isset($_SESSION['userid'])) {
			echo "<div id=\"realTimeData\" data-page=\"Posting Board: ". $result['Title']. "\"></div>\n";
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	
	try {
		// Top Intro
		$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
		$sql = "SELECT users.DisplayName,postingBoards.Title,postingBoards.Description,postingBoards.BoardID FROM postingBoards INNER JOIN users ON postingBoards.Creator=users.UserID WHERE BoardID=". $_GET['board'];
		$result = $connection->query($sql)->fetch();
		
		echo "<article class=\"w3-theme-";
			if (isset($_SESSION['ld'])) {
				echo $_SESSION['ld'];
			} else {
				echo "l";
			}
		echo "2 w3-content\">\n";
			echo "<h1>". $result['Title']. ": <em>". $result['DisplayName']. "</em></h1>\n";
			echo "<p>". $result['Description']. "</p>\n";
		echo "</article>\n";
		echo "<br />\n";
		
		$sql = "SELECT Private,Creator from postingBoards WHERE BoardID=". $_GET['board']. ";";
		$result = $connection->query($sql)->fetch();
		
		$showBoard = false;
		// Check for private flag
		if (isset($_SESSION['userid']) && $_SESSION['userid'] == $result['Creator']) {
			$showBoard = true;
		} else if ($result['Private'] == "1" && !isset($_SESSION['userid'])) {
			echo "<p>You must be signed in to view this board.</p>";
		} else if ($result['Private'] == "1") {
			$sql = "SELECT friends.UserID,friends.FriendID,postingBoards.Private FROM postingBoards INNER JOIN friends ON postingBoards.Creator=friends.UserID WHERE postingBoards.BoardID=". $_GET['board']. " AND friends.FriendID=". $_SESSION['userid']. ";";
			$result = $connection->query($sql)->fetch();
			if ($result != null) {
				$showBoard = true;
			} else {
				echo "<p>You are not allowed to view this board.</p>";
			}
		} else {
			$showBoard = true;
		}
		
		if ($showBoard) {
			// Posts
			echo "<table class=\"w3-table-all w3-large reload w3-responsive\">\n";
				echo "<thead>\n";
					echo "<tr class=\"w3-theme-";
						if (isset($_SESSION['ld'])) {
							echo $_SESSION['ld'];
						} else {
							echo "l";
						}
					echo "2\">\n";
						echo "<td class=\"w3-col s3\"><p>Creator</p></td>\n";
						echo "<td class=\"w3-col s9\"><p>Post</p></td>\n";
					echo "</tr>\n";
				echo "</thead>\n";
				echo "<tbody>\n";
					$sql = "SELECT users.DisplayName,users.UserID,users.Color,posts.Content FROM posts INNER JOIN users ON posts.Creator=users.UserID WHERE posts.BoardID=". $_GET['board']. " ORDER BY posts.PostID ASC;";
					$result = $connection->query($sql);
					foreach ($result as $row) {
						echo "<tr class=\"w3-theme-";
							if (isset($_SESSION['ld'])) {
								echo $_SESSION['ld'];
							} else {
								echo "l";
							}
						echo "1\">\n";
							echo "<td class=\"w3-dropdown-hover w3-col s3\"><button class=\"w3-btn w3-". $row['Color']. "\" onclick=\"requestFriend(". $row['UserID']. ")\"><p>". $row['DisplayName'];
								echo "<div class=\"w3-dropdown-content w3-card-4\"><p>Click to request as friend</p></div>";
							echo "</p></button></td>\n";
							echo "<td class=\"w3-col s9\"><p>\"". nl2br(utf8_decode($row['Content'])). "\"</p></td>\n";
						echo "</tr>\n";
					}
				echo "</tbody>\n";
			echo "</table>\n";
		
			// Create Post
			if (isset($_SESSION['username'])) {
				echo "<form id=\"post\" action=\"registerPost(". $_GET['board']. ")\">\n";
					echo "<fieldset>\n";
						echo "<legend>\n";
							echo "<h2 class=\"w3-container\">Post</h2>\n";
						echo "</legend>\n";
						echo "<p>\n";
							echo "<textarea name=\"post\" class=\"w3-input\" placeholder=\"Post Here\"></textarea>\n";
						echo "</p>\n";
						echo "<p>\n";
							echo "<button class=\"w3-btn\" onclick=\"registerPost(". $_GET['board']. ")\">Post</button>";
						echo "</p>\n";
					echo "</fieldset>\n";
				echo "</form>";
			} else {
				echo "<p>You must be signed in to post.</p>\n";
			}
		}
	} catch (PDOException $e) {
		die($e->getMessage());
	}
?>
	<br /><br /><br />
</body>
</html>