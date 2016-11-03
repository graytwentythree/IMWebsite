<?php
define('CONNECTIONSTRING', 'mysql:host=localhost;dbname=imwebsite');
define('DBUSER', 'root');
define('DBPASS', '');
try {
	$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
	$sql = "CREATE TABLE IF NOT EXISTS users(Username TEXT, Password TEXT, DisplayName TEXT, SessionID TEXT)";
	$connection->exec($sql);
	$sql = "CREATE TABLE IF NOT EXISTS postingBoards(Creator TEXT, Title TEXT, BoardID INTEGER AUTO_INCREMENT UNIQUE NOT NULL)";
	$connection->exec($sql);
	$sql = "CREATE TABLE IF NOT EXISTS posts(Username TEXT, Content TEXT, BoardID INTEGER NOT NULL, PostID INTEGER AUTO_INCREMENT UNIQUE NOT NULL)";
	$connection->exec($sql);
} catch (PDOException $e) {
	die($e->getMessage());
}
?>