<link rel="stylesheet" type="text/css" href="../CSS/footer.css" />

<footer>
	<nav>
		<?php
			if (isset($_GET['sid'])) {
				echo "<ul class=\"w3-navbar w3-card-8\">";
					echo "<li><a href=\"/IMWebsite/PHP/PostingBoard.php?sid=". $_GET['sid']. "\">Posting Board</a></li>\n";
					echo "<li><a href=\"#\">Who's Online</a></li>\n";
					echo "<li><a href=\"/IMWebsite/PHP/About.php?sid=". $_GET['sid']. "\">About</a></li>\n";
					echo "<li class=\"w3-right w3-dropdown-hover\">";
						echo "<a href=\"#\">". $_SESSION['nickName']. "</a>";
						echo "<div class=\"w3-dropdown-content w3-right\" style=\"right:0\">";
							echo "<a href=\"/IMWebsite/PHP/Logout.php?sid=". $_GET['sid']. "\">Sign Out</a>";
						echo "</div>";
					echo "</li>\n";
				echo "</ul>";
			} else {
				echo "<ul class=\"w3-navbar w3-card-8\">";
					echo "<li><a href=\"/IMWebsite/PHP/MainPage.php\">IMWebsite</a></li>\n";
					echo "<li><a href=\"/IMWebsite/PHP/PostingBoard.php\">Posting Board</a></li>\n";
					echo "<li><a href=\"#\">Who's Online</a></li>\n";
					echo "<li><a href=\"/IMWebsite/PHP/About.php\">About</a></li>\n";
					echo "<li class=\"w3-right\"><a href=\"/IMWebsite/PHP/Register.php\">Register</a></li>\n";
					echo "<li class=\"w3-right\"><a href=\"/IMWebsite/PHP/Login.php\">Sign In</a></li>\n";
				echo "</ul>";
			}
		?>
		<p>No Copyright IMWebsite &copy; 2016</p>
	</nav>
</footer>