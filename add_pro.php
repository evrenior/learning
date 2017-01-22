<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<!-- Adding book using prepair method to database -->
    <?php
        $author = 'Denis 123';
        $title = 'Tennis in life123';
        $category = 'tennis234';
        $year = '1991';
        $isbn = '1234567890988';
        $conn = new mysqli('localhost', "root", "1237698", "denis");
        $stmp = $conn->prepare('INSERT INTO denis_table VALUES(?, ?, ?, ?, ?)');
        $stmp->bind_param('sssis', $author, $title, $category, $year, $isbn);
        $stmp->execute();
        printf("%d : Применилось к строкам", $stmp->affected_rows);
        $stmp->close();
        $conn->close();
    ?>
</body>
</html>