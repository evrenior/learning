<!-- auth.php Создание таблицы пользователей users и добавления  новых пользователей с проверкой вводимых данных  -->
<?php
	$conn = new mysqli("localhost", "root", "1237698", "denis");
	if($conn->connect_error) die($conn->connect_error);
		// Создание базы данных
		// $query = "CREATE TABLE users(
		// name VARCHAR(32) NOT NULL,
		// surname VARCHAR(32) NOT NULL,
		// username VARCHAR(32) NOT NULL UNIQUE,
		// password VARCHAR(32) NOT NULL	
		// )";
		// $result = $conn->query($query);
		// if(!$result) die($conn->error);
		$pre = "fdsm";
		$posle = "sdcx";

		$name = "Dzianis";
		$surmane = "Zhaunerchyk";	
		$username = "evrenior1";
		$password = "1237698";
		$token = hash('ripemd128', "$pre$password$posle");
		create_user($conn, $name, $surmane, $username, $token);


	
	function create_user($connection, $name, $lastname, $username, $password){
		$query = "INSERT INTO users VALUES('$name', '$lastname', '$username', '$password')";
		$result = $connection->query($query);
		if(!$result) die($result->error);
		$result->close;
	}
	$conn->close();
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Создание таблицы и добавление пользователя.</title>
</head>
<body>
	
</body>
</html>