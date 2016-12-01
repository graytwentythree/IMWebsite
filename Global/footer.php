<link rel="stylesheet" type="text/css" href="/IMWebsite/Global/footer.css" />

<footer class="w3-bottom">
	<?php
		echo "<nav class=\"w3-container w3-navbar w3-card-8 w3-theme-";
			if (isset($_SESSION['ld'])) {
				echo $_SESSION['ld'];
			} else {
				echo "l";
			}
		echo "4\">";
	?>
		<div>
			<ul>
				<li><a href="/IMWebsite\" class="w3-hover-theme">IMWebsite</a></li>
				<li><a href="/IMWebsite/PostingBoard" class="w3-hover-theme">Posting Board</a></li>
				<li><a href="/IMWebsite/Who_sOnline" class="w3-hover-theme">Who's Online</a></li>
				<li><a href="/IMWebsite/About" class="w3-hover-theme">About</a></li>
			</ul>
			<div class="w3-clear"></div>
			<?php echo "<p>No Copyright IMWebsite &copy; ". date("Y"). "</p>\n" ?>
		</div>
	</nav>
</footer>