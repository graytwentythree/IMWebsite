<?php
define('CONNECTIONSTRING', 'mysql:host=localhost;dbname=imwebsite');
define('DBUSER', 'root');
define('DBPASS', '');
try {
	$connection = new PDO(CONNECTIONSTRING, DBUSER, DBPASS);
	$sql = "CREATE TABLE IF NOT EXISTS users(Username TEXT, Password TEXT, DisplayName TEXT, CurrentPage TEXT, CurrentTime BIGINT, UserID INTEGER AUTO_INCREMENT UNIQUE NOT NULL)";
	$connection->exec($sql);
	$sql = "CREATE TABLE IF NOT EXISTS postingBoards(Creator INTEGER, Title TEXT, Private BOOLEAN, BoardID INTEGER AUTO_INCREMENT UNIQUE NOT NULL)";
	$connection->exec($sql);
	$sql = "CREATE TABLE IF NOT EXISTS posts(Creator INTEGER, Content TEXT, BoardID INTEGER NOT NULL, PostID INTEGER AUTO_INCREMENT UNIQUE NOT NULL)";
	$connection->exec($sql);
	$sql = "CREATE TABLE IF NOT EXISTS friends(UserID INTEGER, FriendID INTEGER)";
	$connection->exec($sql);
	$sql = "CREATE TABLE IF NOT EXISTS friendRequests(UserID INTEGER, FriendID INTEGER)";
	$connection->exec($sql);
} catch (PDOException $e) {
	die($e->getMessage());
}
?>