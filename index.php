<?php
/**
 * Created by IntelliJ IDEA.
 * User: tema_on
 * Date: 22.02.17
 * Time: 21:46
 */

require_once 'lib/db_connect.php';

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
</head>
<body>
<table class='table'>
    <thead>
        <th>ID</th>
        <th>Заголовок</th>
        <th>Описание</th>
        <th>Ссылка</th>
    </thead>
    <tbody>
    <?php
        $query = mysqli_query($connect,"SELECT * FROM posts");
        while($post = mysqli_fetch_object($query)){
            echo '<tr>';
            echo '<td>',$post->id,'</td>';
            echo '<td>',$post->title,'</td>';
            echo '<td>',$post->description,'</td>';
            echo '<td>',"<a href='/show.php?id=$post->id'>Читать...</a>",'</td>';
            echo '</tr>';
        }
    ?>
    </tbody>
</table>
</body>
</html>




