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
		echo "<div id=\"realTimeData\" data-page=\"Color\"></div>\n";
	}
	
	// Top Intro
	echo "<article class=\"w3-theme-";
		if (isset($_SESSION['ld'])) {
			echo $_SESSION['ld'];
		} else {
			echo "l";
		}
	echo "2 w3-content\">";
		echo "<h1>Color</h1>";
		echo "<p>Here you can pick a color scheme for the site</p>";
	echo "</article>";
	
	// Color Buttons
		echo "<article class=\"w3-theme-";
			if (isset($_SESSION['ld'])) {
				echo $_SESSION['ld'];
			} else {
				echo "l";
			}
		echo "1 w3-content\">";
	?>
			<p><button class="w3-btn w3-left w3-hover-theme w3-white" onclick="pickLD('l')">Light</button><button class="w3-btn w3-right w3-hover-theme w3-black" onclick="pickLD('d')">Dark</button><p>
			<p><button class="w3-btn-block w3-hover-theme w3-red" onclick="pickColor('red')">red</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-pink" onclick="pickColor('pink')">pink</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-purple" onclick="pickColor('purple')">purple</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-deep-purple" onclick="pickColor('deep-purple')">deep-purple</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-indigo" onclick="pickColor('indigo')">indigo</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-blue" onclick="pickColor('blue')">blue</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-light-blue" onclick="pickColor('light-blue')">light-blue</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-cyan" onclick="pickColor('cyan')">cyan</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-teal" onclick="pickColor('teal')">teal</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-green" onclick="pickColor('green')">green</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-light-green" onclick="pickColor('light-green')">light-green</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-lime" onclick="pickColor('lime')">lime</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-khaki" onclick="pickColor('khaki')">khaki</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-yellow" onclick="pickColor('yellow')">yellow</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-amber" onclick="pickColor('amber')">amber</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-orange" onclick="pickColor('orange')">orange</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-deep-orange" onclick="pickColor('deep-orange')">deep-orange</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-blue-grey" onclick="pickColor('blue-grey')">blue-grey</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-brown" onclick="pickColor('brown')">brown</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-grey" onclick="pickColor('grey')">grey</button></p>
			<p><button class="w3-btn-block w3-hover-theme w3-dark-grey" onclick="pickColor('dark-grey')">dark-grey</button></p>
		</article>
	<br /><br /><br />
</body>
</html>
