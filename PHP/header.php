<link rel="stylesheet" type="text/css" href="../CSS/header.css" />

<?php
	if (isset($_GET['sid'])) {
		session_start($_GET['sid']);
	}
?>

<header>
	<nav>
		<?php
		if (isset($_SESSION['username'])) {
			echo "<ul class=\"w3-navbar w3-card-8\">";
				echo "<li><h1><a href=\"/IMWebsite/PHP/MainPage.php?sid=". $_GET['sid']. "\">IMWebsite</a></h1></li>\n";
				echo "<div class=\"w3-clear\"></div>";
				echo "<li><a href=\"/IMWebsite/PHP/PostingBoard.php?sid=". $_GET['sid']. "\">Posting Board</a></li>\n";
				echo "<li><a href=\"#\">Who's Online</a></li>\n";
				echo "<li><a href=\"/IMWebsite/PHP/About.php?sid=". $_GET['sid']. "\">About</a></li>\n";
				echo "<li class=\"w3-right w3-dropdown-hover\">";
					echo "<a href=\"#\">". $_SESSION['displayName']. "</a>";
					echo "<div class=\"w3-dropdown-content w3-right\" style=\"right:0\">";
						echo "<a href=\"/IMWebsite/PHP/Logout.php?sid=". $_GET['sid']. "\">Sign Out</a>";
					echo "</div>";
				echo "</li>\n";
			echo "</ul>";
		} else {
			echo "<ul class=\"w3-navbar w3-card-8\">";
				echo "<li><h1><a href=\"/IMWebsite/PHP/MainPage.php\">IMWebsite</a></h1></li>\n";
				echo "<div class=\"w3-clear\"></div>";
				echo "<li><a href=\"/IMWebsite/PHP/PostingBoard.php\">Posting Board</a></li>\n";
				echo "<li><a href=\"#\">Who's Online</a></li>\n";
				echo "<li><a href=\"/IMWebsite/PHP/About.php\">About</a></li>\n";
				echo "<li class=\"w3-right\"><a href=\"/IMWebsite/PHP/Register.php\">Register</a></li>\n";
				echo "<li class=\"w3-right\"><a href=\"/IMWebsite/PHP/Login.php\">Sign In</a></li>\n";
			echo "</ul>";
		}
		?>
	</nav>
</header>