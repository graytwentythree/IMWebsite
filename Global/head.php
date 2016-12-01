<meta charset="utf-8">
<title>IMWebsite</title>
<link rel="stylesheet" type="text/css" href="/IMWebsite/Global/reset.css" />
<link rel="stylesheet" type="text/css" href="http://www.w3schools.com/lib/w3.css" />
<?php
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"http://www.w3schools.com/lib/w3-theme-";
	if (isset($_SESSION['color'])) {
		echo $_SESSION['color'];
	} else {
		echo "blue";
	}
	echo ".css\" />";
?>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript"> 
	window.jQuery || document.write('<script src="/jquery-1.9.1.min.js"><\/script>');
</script>
<script type="text/JavaScript" src="/IMWebsite/Global/global.js"></script>