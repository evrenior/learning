<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>mysqlrunner.php Вывод из базы denis_table всех книг с полями</title>
</head>
<body>
	<?php
		include_once('login.php');
		$conn = new mysqli($hn, $un, $pw, $db);
		if($conn->connect_error) die($conn->connect_error);
		$query = 'SELECT * FROM denis_table';
		$result = $conn->query($query);
		if (!$result) die($conn->error);
		$rows = $result->num_rows;

		for($i = 0; $i < $rows ; $i++){
			$result->data_seek($i);
			echo "Автор - ".$result->fetch_assoc()['author'].'<br>';
			$result->data_seek($i);
			echo "Название книги - ".$result->fetch_assoc()['title'].'<br>';
			$result->data_seek($i);
			echo "Категория книги - ".$result->fetch_assoc()['category'].'<br>';
			$result->data_seek($i);
			echo "Год издания - 22".$result->fetch_assoc()['year'].'<br>';
			$result->data_seek($i);
			echo "ISBN: ".$result->fetch_assoc()['isbn'].'<br><br>';
		}

		$result->close();
		$conn->close();
	?>
</body>
</html>

