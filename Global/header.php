<link rel="stylesheet" type="text/css" href="/IMWebsite/Global/header.css" />

<?php
	echo "<header class=\"w3-top w3-container w3-card-8 w3-theme-";
		if (isset($_SESSION['ld'])) {
			echo $_SESSION['ld'];
		} else {
			echo "l";
		}
	echo "4\">\n";
		echo "<nav class=\"w3-navbar\">\n";
			if (isset($_SESSION['username'])) {
				echo "<ul>\n";
					echo "<li><h1><a href=\"/IMWebsite\" class=\"w3-hover-theme\">IMWebsite</a></h1></li>\n";
					echo "<div class=\"w3-clear\"></div>";
					echo "<li><a href=\"/IMWebsite/PostingBoard\" class=\"w3-hover-theme\">Posting Board</a></li>\n";
					echo "<li><a href=\"/IMWebsite/Who_sOnline\" class=\"w3-hover-theme\">Who's Online</a></li>\n";
					echo "<li><a href=\"/IMWebsite/About\" class=\"w3-hover-theme\">About</a></li>\n";
					echo "<li class=\"w3-right w3-dropdown-hover\">";
						echo "<a href=\"#\" class=\"w3-hover-theme\">". $_SESSION['displayName']. "</a>";
						echo "<div class=\"w3-dropdown-content w3-right w3-theme-";
							if (isset($_SESSION['ld'])) {
								echo $_SESSION['ld'];
							} else {
								echo "l";
							}
						echo "4\" style=\"right:0\">\n";
							echo "<a href=\"/IMWebsite/Friends\" class=\"w3-hover-theme w3-center\">Friends</a>\n";
							echo "<a href=\"/IMWebsite/Color\" class=\"w3-hover-theme w3-center\">Color</a>\n";
							echo "<button onclick=\"endSession()\" class=\"w3-btn w3-btn-block w3-hover-theme w3-theme-";
								if (isset($_SESSION['ld'])) {
									echo $_SESSION['ld'];
								} else {
									echo "l";
								}
							echo "4\">Sign Out</button>\n";
						echo "</div>\n";
					echo "</li>\n";
				echo "</ul>\n";
			} else {
				echo "<ul>";
					echo "<li><h1><a href=\"/IMWebsite\" class=\"w3-hover-theme\">IMWebsite</a></h1></li>\n";
					echo "<div class=\"w3-clear\"></div>";
					echo "<li><a href=\"/IMWebsite/PostingBoard\" class=\"w3-hover-theme\">Posting Board</a></li>\n";
					echo "<li><a href=\"/IMWebsite/Who_sOnline\" class=\"w3-hover-theme\">Who's Online</a></li>\n";
					echo "<li><a href=\"/IMWebsite/About\" class=\"w3-hover-theme\">About</a></li>\n";
					echo "<li class=\"w3-right\"><a href=\"/IMWebsite/Register\" class=\"w3-hover-theme\">Register</a></li>\n";
					echo "<li class=\"w3-right\"><a href=\"/IMWebsite/Login\" class=\"w3-hover-theme\">Sign In</a></li>\n";
				echo "</ul>";
			}
			echo "<noscript><p>Your browser does not support JavaScript.  Without JavaScript you will not be able to see posts or posting boards in real time.</p></noscript>\n";
		echo "</nav>\n";
	echo "</header>\n";
?>
<br /><br /><br /><br /><br /><br />