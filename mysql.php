<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> mysql.php Вывод всех книг из таблицы denis_table с зелёным фоном и переходм по кнопке Ссылка </title>
</head>
<body style="background: #0C0;">
	<a href="#123">Ссылка</a>
	<div style="background: #FFF; padding: 0.5em; border: 0.4em solid #000;">
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
		$row = $result->fetch_array(MYSQLI_BOTH);
		echo "<h3>Книга #$i</h3>";
		echo "<b>Автор - </b>".$row[0].'<br>';
		$result->data_seek($i);
		echo "<b>Название книги</b> - ".$row['title'].'<br>';
		$result->data_seek($i);
		echo "Категория книги - ".$row['category'].'<br>';
		$result->data_seek($i);
		echo "Год издания - ".$row['year'].'<br>';
		$result->data_seek($i);
		echo "ISBN: ".$row['isbn'].'<br><br>';
	}

	$result->close();
	$conn->close();
	?>
	</div>
	<div id="123"></div>
</body>
</html>
