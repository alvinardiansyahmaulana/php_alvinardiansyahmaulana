<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/models/hobby.php';

$hobby = new \models\Hobby;

if ($_POST['search']) {
    $data = $hobby->searchHobby($_POST['search']);
} else {
    $data = $hobby->searchHobby();
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 2</title>
    <style>
        .box {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        table {
            padding: 20px 10px;
            min-width: 350px;
            border: 1px solid;
        }
        td {
            border: 1px solid;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="box">
        <table>
            <tr>
                <th>Hobi</th>
                <th>Jumlah Person</th>
            </tr>
            <tr>
                <form action="" method="POST">
                <td><input type="text" name="search" /></td>
                <td><input type="submit" value="search by hobby"></td>
                </form>
            </tr>
            <?php foreach ($data as $key => $value) { ?>
                <tr>
                    <?php foreach ($value as $hobbyReport) { ?>
                        <td><?php echo $hobbyReport ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
        <br>
    </div>
</body>
</html>