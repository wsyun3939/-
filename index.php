<?php
require('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>入退室管理システム</title>
</head>

<body>
    <h1>土居研究室　入退室管理システム</h1>
    <div class="num">
        <?php
        $counts = $db->query('select count(*) as num  from history where student_status=1');
        $count=$counts->fetch_assoc();
        ?>
        研究室に今<?php echo $count['num']; ?>人います．<br>
        <?php
        $names = $db->query('select student_name from history where student_status=1');
        ?>
        入室中：<?php foreach($names as $name){
        echo $name['student_name'].' ';
        } ?>
    </div>
    <br>
    <table border="1" >
        <tr>
        <th>記録時間</th>
        <th>名前</th>
        <th>状態</th>
        </tr>
        <?php $tables=$db->query('select time,student_name,student_status from history');?>
        <?php foreach($tables as $table){
            echo '<tr>'.
            '<td>'.$table['time'].'</td>'.
            '<td>'.$table['student_name'].'</td>'.
            '<td>'.$table['student_status'].'</td>'.
            '</tr>';
        }
        ?>
    </table>
</body>

</html>