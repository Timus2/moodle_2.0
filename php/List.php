<?php
require_once '../config/ConnectDatabase.php';

$sql = "SELECT * FROM data_values;";
$values = mysqli_query($connect, $sql);
$values = mysqli_fetch_all($values);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/table.css">
    <meta charset="UTF-8">
    <title>История</title>
</head>
<body>
<div class="container">
    <table class="table">
        <tr>
            <th>Номер</th>
            <th>a</th>
            <th>b</th>
            <th>c</th>
            <th>x1</th>
            <th>x2</th>
            <th>Время</th>
        </tr>
        <?php
        foreach ($values as $item) {
            ?>
            <tr>
                <td><?= $item[0] ?></td>
                <td><?= $item[1] ?></td>
                <td><?= $item[2] ?></td>
                <td><?= $item[3] ?></td>
                <td><?= $item[4] ?></td>
                <td><?= $item[5] ?></td>
                <td><?= $item[6] ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
</body>
</html>
