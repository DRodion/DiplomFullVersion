<div id="block-parameters">
    <p id="title-page" >Количество пользователей на сайте: <?php echo $online_count['count(id)'];?></p>
</div>
<table>
    <tr><th>ФИО</th><th>Логин</th><th>Пароль</th><th>Статус</th></tr>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM customers");

    If (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);
        do
        {
            if ($row["status"] == 1)
            {
                $stat = 'Администратор';
            }
            if ($row["status"] == 2)
            {
                $stat = 'Студент';
            }
            if ($row["status"] == 3)
            {
                $stat = 'Преподаватель';
            }
            echo '<tr><td>'.$row["FIO"].'</td><td>'.$row["login"].'</td><td>'.$row["password"].'</td><td>'.$stat.'</td></tr>';
        }
        while ($row = mysqli_fetch_array($result));
    }
    ?>
</table>
