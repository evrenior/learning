<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- books.php Тестовое задание от ROGUE FITNESS вывод всех книг с удобной сортировкой по заглавной букве  -->
	<title>List of boks from MySQL database </title>
</head>
<body>
	<?php
		$conn = new mysqli('localhost', 'root', '1237698', 'denis');
		$query = "SELECT title from books order by title ASC";
		$letters = array();
		$result = $conn->query($query);
		$rows = $result->num_rows;
		$alphabet = '';
		for($i = 0; $i < $rows; ++$i){
			$result->data_seek($i);
			$row = $result-> fetch_array(MYSQL_NUM);
			$alphabet .= "<br>". check_symbol($row, $letters);
		}
		echo "<br>";
		$alphas = range("A", "Z");
		foreach ($alphas as $key => $value) {
			foreach ($letters as $some_let) {
				if($value == $some_let) {
					echo "<a href=\"#$value\">$value </a>";
					continue 2;
				} 	
			}
			echo "$value ";
		}	
		echo $alphabet;
		$result->close();
		$conn->close();
		function check_symbol($row, &$letters){
			$first_letter = strtoupper($row[0][0]);
			if(in_array($first_letter, $letters)) return $row[0];	
			else {
				array_push($letters, $first_letter);
				return "<div id=\"$first_letter\" style=\"margin-top: 100px; font-style:;\"><b>$first_letter</b></div>".$row[0];
			}
			
		}
	?>
</body></html>