<?php
//File for login with php and redirection to session
    $conn = new mysqli("localhost", "root", "1237698", "denis");
    if($conn->connect_error) die($conn->connect_error);
    if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
        header('Content-Type: text/html; charset=utf-8');
        $ff_user = mysql_entities_fix_string($conn, $_SERVER['PHP_AUTH_USER']);
        $ff_pwd = mysql_entities_fix_string($conn, $_SERVER['PHP_AUTH_PW']);
        $pre = "fdsm";
        $posle = "sdcx";
        $query = "SELECT * FROM users WHERE username='$ff_user' ";
        $result = $conn->query($query);
        if (!$result) die($result->error);
        elseif ($result->num_rows) {
            $row = $result->fetch_array(MYSQLI_NUM);
            $result->close();
            $token = hash('ripemd128', "$pre$ff_pwd$posle");
            if($token == $row[3]) {
                session_start();
                $_SESSION['name'] = $row[0];
                $_SESSION['surname'] = $row[1];
                $_SESSION['username'] = $ff_user;
                $_SESSION['password'] = $ff_pwd;		
                die("<a href='continue.php'>Продолжить...</a> $_SESSION['count']");	
            }	
        }
		else die("Invalid $ff_user / $ff_pwd");
    } else {
        header('WWW-Authenticate : Basic realm="Restricted Section"');
        header('HTTP/1.0 401 Unauthorized');
        header('Content-Type: text/html; charset=utf-8');
        die("Invalid login and password");
    }

    $conn->close();
    function mysql_entities_fix_string($connection, $string) {
        return htmlentities(mysql_fix_string($connection, $string));
    }

    function mysql_fix_string($connection, $string) {
        if(get_magic_quotes_gpc()) $string = stripslashes($string);
            return $connection->real_escape_string($string);
    }		