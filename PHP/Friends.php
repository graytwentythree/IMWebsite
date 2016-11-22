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
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/HTML/Friends.html";

		try {
			$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
			echo "<article class=\"reload\">\n";
				echo "<h2>Friends</h2>\n";
				echo "<table class=\"w3-table-all w3-large w3-responsive\">\n";
					echo "<thead>\n";
						echo "<tr>\n";
							echo "<td><p>Name</p></td>\n";
							echo "<td><p>Last Location</p></td>\n";
							echo "<td><p>Last Activity</p></td>\n";
						echo "</tr>\n";
					echo "</thead>\n";
					echo "<tbody>\n";
						$sql = "SELECT friendUsers.DisplayName,friendUsers.CurrentTime,friendUsers.CurrentPage,friendUsers.UserID from users INNER JOIN friends ON users.UserID=friends.userID INNER JOIN users AS friendUsers ON friends.FriendID=friendUsers.UserID WHERE users.UserID=". $_SESSION['userid']. ";";
						$result = $connection->query($sql);
						foreach ($result as $row) {
							echo "<tr>\n";
								echo "<td class=\"w3-dropdown-hover\"><button class=\"w3-btn w3-theme-l1\" onclick=\"removeFriend(". $row['UserID']. ")\"><p>". $row['DisplayName'];
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
				
				echo "<div class=\"reload\">\n";
				echo "<h2>Friend Requests</h2>\n";
				echo "<table class=\"w3-table-all w3-large w3-responsive\">\n";
					echo "<thead>\n";
						echo "<tr>\n";
							echo "<td><p>Name</p></td>\n";
							echo "<td><p>Last Location</p></td>\n";
							echo "<td><p>Last Activity</p></td>\n";
						echo "</tr>\n";
					echo "</thead>\n";
					echo "<tbody>\n";
						$sql = "SELECT friendUsers.DisplayName,friendUsers.CurrentTime,friendUsers.CurrentPage,friendUsers.UserID from users INNER JOIN friendRequests ON users.UserID=friendRequests.FriendID INNER JOIN users AS friendUsers ON friendRequests.UserID=friendUsers.UserID WHERE users.UserID=". $_SESSION['userid']. ";";
						$result = $connection->query($sql);
						foreach ($result as $row) {
							echo "<tr>\n";
								echo "<td class=\"w3-dropdown-hover\"><button class=\"w3-btn w3-theme-l1\" onclick=\"makeFriend(". $row['UserID']. ")\"><p>". $row['DisplayName'];
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
				
				echo "<h2>All Users</h2>\n";
				echo "<table class=\"w3-table-all w3-large w3-responsive\">\n";
					echo "<thead>\n";
						echo "<tr>\n";
							echo "<td><p>Name</p></td>\n";
							echo "<td><p>Last Location</p></td>\n";
							echo "<td><p>Last Activity</p></td>\n";
						echo "</tr>\n";
					echo "</thead>\n";
					echo "<tbody>\n";
						$sql = "SELECT DisplayName,CurrentPage,CurrentTime,UserID FROM users;";
						$result = $connection->query($sql);
						foreach ($result as $row) {
							echo "<tr>\n";
								echo "<td class=\"w3-dropdown-hover\"><button class=\"w3-btn w3-theme-l1\" onclick=\"requestFriend(". $row['UserID']. ")\"><p>". $row['DisplayName'];
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
