<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Script of adding, removing and showing books from denis_table   
    </title>
</head>
<body>
    <?php
//Script of adding, removing and showing books from denis_table    
        $conn  = new mysqli("localhost", "root", "1237698", "denis");
        if($conn->connect_error) echo $conn->connect_error;
        if(isset($_POST['delete']) && isset($_POST['isbn'])){
            $isbn = get_post($conn, 'isbn');
            $query = "DELETE from denis_table where isbn='$isbn'";
            $result = $conn->query($query);
            if(!$result) echo "Error occured ".$conn->error;
        }
        if(isset($_POST['author']) && isset($_POST['title']) && isset($_POST['category']) && isset($_POST['year']) && isset($_POST['isbn'])) {
            $author = get_post($conn, 'author');
            $title = get_post($conn, 'title');
            $category = get_post($conn, 'category');
            $year = get_post($conn, 'year');
            $isbn = get_post($conn, 'isbn');
            $query1 = "INSERT into denis_table VALUES ('$author', '$title', '$category', '$year', '$isbn')";
            $result = $conn->query($query1);
            if(!$result) echo $conn->error;
            else{
                echo "<b>Book added successfully</b>";
            }
        }
        if(0 == 0) {
            echo "<pre style=\"border: 1px solid #000\"><form action=\"new_mysql.php\" method=\"POST\">
Author: <input type=\"text\" name=\"author\">
Book name: <input type=\"text\" name=\"title\">
Category: <input type=\"text\" name=\"category\">
Year: <input type=\"text\" name=\"year\">
ISBN: <input type=\"text\" name=\"isbn\">
<input type=\"submit\" name=\"submit\" value=\"Add book\">
</form></pre>";	
        }	
        $query = 'Select * from denis_table';
        $result = $conn->query($query);
        $rows = $result->num_rows;	
        for ($i = 0; $i < $rows; ++$i) {
            $result->data_seek($i);
            $row = $result-> fetch_array(MYSQL_ASSOC);
            echo <<<_END
	<pre>
	Author: $row[author]
	Book name: $row[title]
	Category: $row[category]
	Year $row[year]
	ISBN: $row[isbn]
	<form action="new_mysql.php" method="POST">
	<input type="hidden" value="yes" name="delete"><input type="hidden" value="$row[isbn]" name="isbn"><input type="submit" value="Удалить $row[isbn]" name="submit">
	</form>
	</pre>
_END;
        }
        $result->close();
        $conn->close();

        function get_post($conn, $var){
            return $conn->real_escape_string($_POST[$var]);
        }
    ?>
</body>
</html>