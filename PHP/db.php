<?php
define('CONNECTIONSTRING', 'mysql:host=localhost;dbname=imwebsite');
define('DBUSER', 'root');
define('DBPASS', '');
try {
	$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
	$sql = "CREATE TABLE IF NOT EXISTS users(Username TEXT, Password TEXT)";
	$connection->exec($sql);
} catch (PDOException $e) {
	die($e->getMessage());
}
?>