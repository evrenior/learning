<!-- form.php Получение данных массива POST в виде массива  -->
<?php
	$value = $_POST['veg'];
	for ($i=0;  $i <  count($value); $i++)  { 
		echo "$value[$i] ";
	}
	echo $_POST['color'];
?>