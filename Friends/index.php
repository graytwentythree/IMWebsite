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
		echo "<div id=\"realTimeData\" data-page=\"Friends\"></div>\n";
	}

	// Top Intro
	echo "<article class=\"w3-theme-";
		if (isset($_SESSION['ld'])) {
			echo $_SESSION['ld'];
		} else {
			echo "l";
		}
	echo "2 w3-content\">\n";
		echo "<h1>Friends</h1>\n";
		echo "<p>These are the people that you are friends with.</p>\n";
	echo "</article>\n";

	// Friends
	try {
		$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
		echo "<article class=\"reload\">\n";
			echo "<h2>Friends</h2>\n";
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
						echo "<td><p>Last Location</p></td>\n";
						echo "<td><p>Last Activity</p></td>\n";
					echo "</tr>\n";
				echo "</thead>\n";
				echo "<tbody>\n";
					$sql = "SELECT friendUsers.DisplayName,friendUsers.Color,friendUsers.CurrentTime,friendUsers.CurrentPage,friendUsers.UserID from users INNER JOIN friends ON users.UserID=friends.userID INNER JOIN users AS friendUsers ON friends.FriendID=friendUsers.UserID WHERE users.UserID=". $_SESSION['userid']. ";";
					$result = $connection->query($sql);
					foreach ($result as $row) {
						echo "<tr class=\"w3-theme-";
							if (isset($_SESSION['ld'])) {
								echo $_SESSION['ld'];
							} else {
								echo "l";
							}
						echo "1\">\n";
							echo "<td class=\"w3-dropdown-hover\"><button class=\"w3-btn w3-". $row['Color']. "\" onclick=\"removeFriend(". $row['UserID']. ")\"><p>". $row['DisplayName'];
								echo "<div class=\"w3-dropdown-content w3-card-4\"><p>Click to remove friend</p></div>";
							echo "</p><button\></td>\n";
							echo "<td><p>". $row['CurrentPage']. "</p></td>\n";
							if ($row['CurrentTime'] != null) {
								echo "<td><p>". date("h:m d/m/Y", $row['CurrentTime']). "</p></td>";
							} else {
								echo "<td></td>";
							}
						echo "</tr>\n";
					}
				echo "</tbody>\n";
			echo "</table>\n";
			
			// Friend Requests
			echo "<div class=\"reload\">\n";
			echo "<h2>Friend Requests</h2>\n";
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
						echo "<td><p>Last Location</p></td>\n";
						echo "<td><p>Last Activity</p></td>\n";
					echo "</tr>\n";
				echo "</thead>\n";
				echo "<tbody>\n";
					$sql = "SELECT friendUsers.DisplayName,friendUsers.Color,friendUsers.CurrentTime,friendUsers.CurrentPage,friendUsers.UserID from users INNER JOIN friendRequests ON users.UserID=friendRequests.FriendID INNER JOIN users AS friendUsers ON friendRequests.UserID=friendUsers.UserID WHERE users.UserID=". $_SESSION['userid']. ";";
					$result = $connection->query($sql);
					foreach ($result as $row) {
						echo "<tr class=\"w3-theme-";
							if (isset($_SESSION['ld'])) {
								echo $_SESSION['ld'];
							} else {
								echo "l";
							}
						echo "1\">\n";
							echo "<td class=\"w3-dropdown-hover\"><button class=\"w3-btn w3-". $row['Color']. "\" onclick=\"makeFriend(". $row['UserID']. ")\"><p>". $row['DisplayName'];
								echo "<div class=\"w3-dropdown-content w3-card-4\"><p>Click to accept friend</p></div>";
							echo "</p></button></td>\n";
							echo "<td><p>". $row['CurrentPage']. "</p></td>\n";
							if ($row['CurrentTime'] != null) {
								echo "<td><p>". date("h:m d/m/Y", $row['CurrentTime']). "</p></td>";
							} else {
								echo "<td></td>";
							}
						echo "</tr>\n";
					}
				echo "</tbody>\n";
			echo "</table>\n";
			
			// All Users
			echo "<h2>All Users</h2>\n";
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
						echo "<td><p>Last Location</p></td>\n";
						echo "<td><p>Last Activity</p></td>\n";
					echo "</tr>\n";
				echo "</thead>\n";
				echo "<tbody>\n";
					$sql = "SELECT DisplayName,Color,CurrentPage,CurrentTime,UserID FROM users;";
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
							if ($row['CurrentTime'] != null) {
								echo "<td><p>". date("h:m d/m/Y", $row['CurrentTime']). "</p></td>";
							} else {
								echo "<td></td>";
							}
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
