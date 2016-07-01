 <!-- continue.php Файл продолжения от файла login_auth.php после проверки логина/пароля с сохранением в сессию  -->
<?php
	session_start();
	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		$name = $_SESSION['name'];
		$surname = $_SESSION['surname'];
		$password = $_SESSION['password'];
		echo "Hi $name,. Your last name is $surname. Your login word is $username, and your password 
		appears to be $password";
	}
	else{
		echo "<a href='login_auth.php'>Please Log In...</a>";
	}
?>