<link rel="stylesheet" type="text/css" href="../CSS/header.css" />

<header class="w3-top w3-container w3-card-8 w3-theme-l4">
	<nav class="w3-navbar">
		<?php
		if (isset($_SESSION['username'])) {
			echo "<ul>";
				echo "<li><h1><a href=\"/IMWebsite/PHP/MainPage.php\" class=\"w3-hover-theme\">IMWebsite</a></h1></li>\n";
				echo "<div class=\"w3-clear\"></div>";
				echo "<li><a href=\"/IMWebsite/PHP/PostingBoard.php\" class=\"w3-hover-theme\">Posting Board</a></li>\n";
				echo "<li><a href=\"/IMWebsite/PHP/Who_sOnline.php\" class=\"w3-hover-theme\">Who's Online</a></li>\n";
				echo "<li><a href=\"/IMWebsite/PHP/About.php\" class=\"w3-hover-theme\">About</a></li>\n";
				echo "<li class=\"w3-right w3-dropdown-hover\">";
					echo "<a href=\"#\" class=\"w3-hover-theme\">". $_SESSION['displayName']. "</a>";
					echo "<div class=\"w3-dropdown-content w3-right\" style=\"right:0\">";
						echo "<a href=\"/IMWebsite/PHP/Friends.php\" class=\"w3-hover-theme\">Friends</a>";
						echo "<a href=\"/IMWebsite/PHP/Logout.php\" class=\"w3-hover-theme\">Sign Out</a>";
					echo "</div>";
				echo "</li>\n";
			echo "</ul>";
		} else {
			echo "<ul>";
				echo "<li><h1><a href=\"/IMWebsite/PHP/MainPage.php\" class=\"w3-hover-theme\">IMWebsite</a></h1></li>\n";
				echo "<div class=\"w3-clear\"></div>";
				echo "<li><a href=\"/IMWebsite/PHP/PostingBoard.php\" class=\"w3-hover-theme\">Posting Board</a></li>\n";
				echo "<li><a href=\"/IMWebsite/PHP/Who_sOnline.php\" class=\"w3-hover-theme\">Who's Online</a></li>\n";
				echo "<li><a href=\"/IMWebsite/PHP/About.php\" class=\"w3-hover-theme\">About</a></li>\n";
				echo "<li class=\"w3-right\"><a href=\"/IMWebsite/PHP/Register.php\" class=\"w3-hover-theme\">Register</a></li>\n";
				echo "<li class=\"w3-right\"><a href=\"/IMWebsite/PHP/Login.php\" class=\"w3-hover-theme\">Sign In</a></li>\n";
			echo "</ul>";
		}
		echo "<noscript><p>Your browser does not support JavaScript.  Without JavaScript you will not be able to see posts or posting boards in real time.</p></noscript>";
		?>
	</nav>
</header>
<br /><br /><br /><br /><br /><br />