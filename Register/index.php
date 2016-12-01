<!DOCTYPE html>
<html>
<head>
	<?php
		session_start();
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/Global/head.php";
	?>
</head>
<body class="w3-theme-l3 w3-container">
	<?php
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/Global/db.php";
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/Global/header.php";
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/Global/footer.php";
		if (isset($_SESSION['userid'])) {
			echo "<div id=\"realTimeData\" data-page=\"Main Page\"></div>\n";
		}
	?>
	<?php
		include $_SERVER["DOCUMENT_ROOT"]. "/IMWebsite/Register/Register.html";
	?>
	<article class="w3-theme-l1 w3-content">
		<form id="register" action="addAccount()">
			<fieldset>
				<legend>
					<h2 class="w3-container">Register</h2>
				</legend>
				<p>
					<input class="w3-input" type="text" name="username" required />
					<label class="w3-label w3-validate">User Name: </label>
				</p>
				<p>
					<input id="pw" class="w3-input" type="password" name="password" required />
					<label class="w3-label w3-validate">Password: </label>
				</p>
				<p>
					<input id="vpw" class="w3-input" type="password" name="vpassword" required />
					<label class="w3-label w3-validate">Verify Password: </label>
				</p>
				<p>
					<input class="w3-input" type="text" name="displayName" required />
					<label class="w3-label w3-validate">Display Name: </label>
				</p>
				<p>
					<button class="w3-btn" onclick="addAccount()">Make Account</button>
				</p>
			</fieldset>
		</form>
		<p id="success" class="w3-hide">Your account has been created</p>
	</article>
	<br /><br /><br />
</body>
</html>